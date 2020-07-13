<?php

/* master.twig */
class __TwigTemplate_3a8dec6585b1d2c62d39560c3f9f4ab3e230ea3d246f2df11f5677fb50e9de69 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html ng-app>
<head>
    <title>";
        // line 4
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["meta"]) ? $context["meta"] : null));
        foreach ($context['_seq'] as $context["metaname"] => $context["metavalue"]) {
            // line 9
            echo "    <meta name=\"";
            echo $context["metaname"];
            echo "\" value=\"";
            echo $context["metavalue"];
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['metaname'], $context['metavalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
    <link href=\"https://fonts.googleapis.com/css?family=Oswald:400,300,700\" rel=\"stylesheet\" type=\"text/css\" />

    <!-- publish javascript variable -->
    <script>
        var global = ";
        // line 16
        echo twig_jsonencode_filter((isset($context["global"]) ? $context["global"] : null));
        echo "
    </script>

    <!-- Include registered css -->
    <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\" />
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["css"]) ? $context["css"] : null), "external", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cssfile"]) {
            // line 22
            echo "    <link rel=\"stylesheet\" href=\"";
            echo $context["cssfile"];
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cssfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
        echo "css/responsive.dataTables.min.css\">
    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["css"]) ? $context["css"] : null), "internal", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cssfile"]) {
            // line 26
            echo "    <link rel=\"stylesheet\" href=\"";
            echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
            echo "css/";
            echo $context["cssfile"];
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cssfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "</head>
<body>
    ";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 31
        echo "
    <!-- Include registered javascript -->
    ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["js"]) ? $context["js"] : null), "external", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["jsfile"]) {
            // line 34
            echo "    <script src=\"";
            echo $context["jsfile"];
            echo "\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jsfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["js"]) ? $context["js"] : null), "internal", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["jsfile"]) {
            // line 38
            echo "    <script src=\"";
            echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
            echo "js/";
            echo $context["jsfile"];
            echo "\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jsfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    <script src=\"";
        echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
        echo "js/loadingoverlay.min.js\"></script>
    <script src=\"";
        // line 41
        echo (isset($context["assetUrl"]) ? $context["assetUrl"] : null);
        echo "js/loadingoverlay_progress.min.js\"></script>

</body>
</html>";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 30,  141 => 41,  136 => 40,  125 => 38,  121 => 37,  118 => 36,  109 => 34,  105 => 33,  101 => 31,  99 => 30,  95 => 28,  84 => 26,  80 => 25,  75 => 24,  66 => 22,  62 => 21,  54 => 16,  47 => 11,  36 => 9,  32 => 8,  25 => 4,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html ng-app>
<head>
    <title>{{ title }}</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    {% for metaname, metavalue in meta %}
    <meta name=\"{{metaname}}\" value=\"{{metavalue}}\" />
    {% endfor %}

    <link href=\"https://fonts.googleapis.com/css?family=Oswald:400,300,700\" rel=\"stylesheet\" type=\"text/css\" />

    <!-- publish javascript variable -->
    <script>
        var global = {{global|json_encode|raw}}
    </script>

    <!-- Include registered css -->
    <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\" />
    {% for cssfile in css.external %}
    <link rel=\"stylesheet\" href=\"{{cssfile}}\" />
    {% endfor %}
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{assetUrl}}css/responsive.dataTables.min.css\">
    {% for cssfile in css.internal %}
    <link rel=\"stylesheet\" href=\"{{assetUrl}}css/{{cssfile}}\" />
    {% endfor %}
</head>
<body>
    {% block body %}{% endblock %}

    <!-- Include registered javascript -->
    {% for jsfile in js.external %}
    <script src=\"{{jsfile}}\"></script>
    {% endfor %}

    {% for jsfile in js.internal %}
    <script src=\"{{assetUrl}}js/{{jsfile}}\"></script>
    {% endfor %}
    <script src=\"{{assetUrl}}js/loadingoverlay.min.js\"></script>
    <script src=\"{{assetUrl}}js/loadingoverlay_progress.min.js\"></script>

</body>
</html>", "master.twig", "");
    }
}
