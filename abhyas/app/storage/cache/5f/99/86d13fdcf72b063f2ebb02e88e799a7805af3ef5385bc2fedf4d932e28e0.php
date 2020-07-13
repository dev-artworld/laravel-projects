<?php

/* master.twig */
class __TwigTemplate_5f9986d13fdcf72b063f2ebb02e88e799a7805af3ef5385bc2fedf4d932e28e0 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["meta"]) ? $context["meta"] : null));
        foreach ($context['_seq'] as $context["metaname"] => $context["metavalue"]) {
            // line 9
            echo "    <meta name=\"";
            echo twig_escape_filter($this->env, (isset($context["metaname"]) ? $context["metaname"] : null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["metavalue"]) ? $context["metavalue"] : null), "html", null, true);
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["css"]) ? $context["css"] : null), "external"));
        foreach ($context['_seq'] as $context["_key"] => $context["cssfile"]) {
            // line 22
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["cssfile"]) ? $context["cssfile"] : null), "html", null, true);
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cssfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
        echo "css/responsive.dataTables.min.css\">
    ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["css"]) ? $context["css"] : null), "internal"));
        foreach ($context['_seq'] as $context["_key"] => $context["cssfile"]) {
            // line 26
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
            echo "css/";
            echo twig_escape_filter($this->env, (isset($context["cssfile"]) ? $context["cssfile"] : null), "html", null, true);
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["js"]) ? $context["js"] : null), "external"));
        foreach ($context['_seq'] as $context["_key"] => $context["jsfile"]) {
            // line 34
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["jsfile"]) ? $context["jsfile"] : null), "html", null, true);
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["js"]) ? $context["js"] : null), "internal"));
        foreach ($context['_seq'] as $context["_key"] => $context["jsfile"]) {
            // line 38
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
            echo "js/";
            echo twig_escape_filter($this->env, (isset($context["jsfile"]) ? $context["jsfile"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jsfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
        echo "js/loadingoverlay.min.js\"></script>
    <script src=\"";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["assetUrl"]) ? $context["assetUrl"] : null), "html", null, true);
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
        return array (  149 => 30,  141 => 41,  136 => 40,  125 => 38,  121 => 37,  118 => 36,  109 => 34,  105 => 33,  101 => 31,  99 => 30,  95 => 28,  84 => 26,  80 => 25,  75 => 24,  66 => 22,  54 => 16,  36 => 9,  25 => 4,  20 => 1,  68 => 14,  65 => 13,  62 => 21,  47 => 11,  45 => 12,  38 => 8,  32 => 8,  29 => 3,  466 => 349,  453 => 347,  449 => 346,  436 => 336,  389 => 291,  374 => 283,  367 => 279,  360 => 275,  350 => 267,  346 => 265,  342 => 263,  340 => 262,  335 => 260,  331 => 258,  327 => 257,  323 => 255,  321 => 254,  316 => 252,  310 => 251,  306 => 250,  299 => 246,  292 => 243,  288 => 242,  128 => 84,  115 => 82,  111 => 81,  31 => 3,  28 => 2,);
    }
}
