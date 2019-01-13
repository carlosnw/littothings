<?php

/* newsletter/templates/blocks/social/widget.hbs */
class __TwigTemplate_866b0d16eb9ffe49f356ab3c26695793390e6b048905bd01d20141bfd3dfa872 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"mailpoet_widget_icon\"><span class=\"dashicons dashicons-facebook\"></span></div>
<div class=\"mailpoet_widget_title\">";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Social");
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/social/widget.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "newsletter/templates/blocks/social/widget.hbs", "/app/public/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/social/widget.hbs");
    }
}
