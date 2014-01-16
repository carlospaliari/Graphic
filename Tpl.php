<?php

/**
 * Class Tpl
 */
class Tpl
{
    /**
     * @var int
     */
    protected static $value_max = 0;

    /**
     * @param array $props
     * @param array $max
     * @param int $tamanho
     * @param int $qtde_scalas
     * @return string
     */
    public static function sample($props, $max = 100, $tamanho = 100, $qtde_scalas = 10)
    {
        static::setMaxValue($max);
        $graph = <<<S
                    <div style="background-color: #e1f5ff; width: $tamanho%"><br><table><tr>
S;
        $graph .= static::generateLabelValues($props);
        $graph .= '</tr><tr><td></td><td>';
        $graph .= static::generateScala($qtde_scalas);
        $graph .= '</td></tr></table></div>';
        return $graph;
    }

    /**
     * @param $qtde_scalas
     * @return string
     */
    protected static function generateScala($qtde_scalas)
    {
        $escala = '';
        $proporcao_acumulada = $proporcao = round(static::$value_max / $qtde_scalas);
        for ($i = 1; $i <= $qtde_scalas;  $i++) {
            $escala .= static::_generateScala($proporcao, $proporcao_acumulada);
            $proporcao_acumulada += $proporcao;
        }
        return '<table style="width: 100%; margin-left: 6px;"><tr style="text-align: right;">' . $escala . '</tr></table>';
    }

    protected static function _generateScala($value, $proporcao_acumulada)
    {
        $width = static::getPercentage($value);
        return "<td style=\"width: $width%;\">$proporcao_acumulada</td>";
    }

    /**
     * @param number $value
     * @return int
     */
    protected static function getPercentage($value)
    {
        if (0 == static::$value_max) {
            return 0;
        }
        return round(round($value, 1) * 100 / round(static::$value_max, 2));
    }

    /**
     * @return string
     */
    protected static function color($value)
    {
        //$limit = static::$value_max;
        //if ($value <= ($limit / 2.04)) {
        //    return 'danger';
        //} elseif ($value <= ($limit / 1.67)) {
        //    return 'warning';
        //}  elseif ($value <= ($limit / 1.265)) {
        //    return 'info';
        //} else {
        //    return 'primary';
        //}
        if ($value >= 80) {
            return 'primary';
        } elseif ($value >= 60) {
            return 'info';
        }  elseif ($value >= 50) {
            return 'warning';
        } else {
            return 'danger';
        }

    }

    /**
     * @param string $label
     * @return string
     */
    protected static function legend($label)
    {
        return "<div class=\"legend\">$label</div>";
    }

    /**
     * @param string $content
     * @return string
     */
    protected static function legends($content)
    {
        return "<td class=\"legends\">$content</td>";
    }

    /**
     * @param string $content
     * @return string
     */
    protected static function values($content)
    {
        return "<td class=\"values\">$content</td>";
    }

    /**
     * @param string $width
     * @param string $color
     * @param string $label
     * @return string
     */
    protected static function value($width, $color, $label)
    {
        if ($width >= 80) {
            $msg = 'Pare de colar';
        } elseif ($width >= 70 && $width < 80) {
            $msg = 'Estude mais ';
        } elseif ($width >= 60 && $width < 70) {
            $msg = 'Melhore';
        } elseif ($width >= 50 && $width < 60) {
            $msg = 'Falta pouco, seu burro';
        } elseif ($width < 50) {
            $msg = 'Seu burro, estuda mais!!!';
        }
        if ($width < 60) {
            $nota = 60 * 2 - $width;
            $nota = 'Falta ' . $nota;
        }
        return "<div style=\"width: $width%;\" class=\"value $color\">$msg {$label}. $nota</div>";
    }

    /**
     * @param array $value
     */
    protected static function setMaxValue($value)
    {
        static::$value_max = $value;
    }

    /**
     * @param $props
     * @return string
     */
    protected static function generateLabelValues($props)
    {
        $legend = '';
        $value = '';
        foreach ($props as $v) {
            $legend .= Tpl::legend($v[0]);
            $value .= Tpl::value(static::getPercentage($v[1]), static::color($v[1]), $v[1]);
        }
        return static::legends($legend) . static::values($value);
    }
}