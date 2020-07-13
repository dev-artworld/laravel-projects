<?php

/* admin/index-activate.twig */
class __TwigTemplate_001042aa6b5d05690ea0a615a8a83b30235258c0a8d85180de56b4433653777a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.twig", "admin/index-activate.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- BEGIN CONTAINER -->
    <div class=\"wrapper\">
        <div class=\"container-fluid\">
            ";
        // line 7
        $this->displayBlock('content', $context, $blocks);
        // line 10
        echo "        </div>
    </div>
    <!-- END CONTAINER -->
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "                ";
        $this->loadTemplate("admin/dashboard.twig", "admin/index-activate.twig", 8)->display($context);
        // line 9
        echo "            ";
    }

    public function getTemplateName()
    {
        return "admin/index-activate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 9,  49 => 8,  46 => 7,  39 => 10,  37 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'master.twig' %}

{% block body %}
    <!-- BEGIN CONTAINER -->
    <div class=\"wrapper\">
        <div class=\"container-fluid\">
            {% block content %}
                {% include 'admin/dashboard.twig' %}
            {% endblock %}
        </div>
    </div>
    <!-- END CONTAINER -->
{% endblock %}
", "admin/index-activate.twig", "");
    }
}
