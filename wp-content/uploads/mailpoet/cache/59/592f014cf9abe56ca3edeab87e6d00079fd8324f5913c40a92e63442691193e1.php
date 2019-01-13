<?php

/* newsletter/templates/blocks/base/toolsGeneric.hbs */
class __TwigTemplate_4ae9bde10d17569da832e379621b3ed492c08d1d435c484edaf9d59943033dff extends Twig_Template
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
        echo "<div class=\"mailpoet_tool_slider\">
{{#if tools.layerSelector}}<a href=\"javascript:;\" class=\"mailpoet_tool mailpoet_newsletter_layer_selector mailpoet_ignore_drag\" title=\"";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Switch editing layer");
        echo "\">
    ";
        // line 3
        echo twig_source($this->env, "newsletter/templates/svg/block-tools/settings-column.svg");
        echo "
</a>{{/if}}{{#if tools.settings}}<a href=\"javascript:;\" class=\"mailpoet_tool mailpoet_edit_block mailpoet_ignore_drag\" title=\"";
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Edit settings");
        echo "\">
";
        // line 5
        echo twig_source($this->env, "newsletter/templates/svg/block-tools/settings.svg");
        echo "
</a>{{/if}}{{#if tools.delete}}<div class=\"mailpoet_delete_block mailpoet_ignore_drag\"><a href=\"javascript:;\" class=\"mailpoet_tool mailpoet_delete_block_activate\" title=\"";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Delete");
        echo "\">";
        echo twig_source($this->env, "newsletter/templates/svg/block-tools/trash.svg");
        echo "</a><a href=\"javascript:;\" class=\"mailpoet_delete_block_cancel\" title=\"";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cancel deletion");
        echo "\">";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cancel");
        echo "</a><a href=\"javascript:;\" class=\"mailpoet_delete_block_confirm\" title=\"";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Confirm deletion");
        echo "\">";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Delete");
        echo "</a></div>{{/if}}{{#if tools.duplicate}}<a href=\"javascript:;\" class=\"mailpoet_tool mailpoet_duplicate_block\" title=\"";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Duplicate");
        echo "\">
";
        // line 7
        echo twig_source($this->env, "newsletter/templates/svg/block-tools/duplicate.svg");
        echo "</a>{{/if}}{{#if tools.move}}<a href=\"javascript:;\" class=\"mailpoet_tool mailpoet_move_block\" title=\"";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Drag to move");
        echo "\">
  ";
        // line 8
        echo twig_source($this->env, "newsletter/templates/svg/block-tools/move.svg");
        echo "
</a>{{/if}}
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/base/toolsGeneric.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 8,  54 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "newsletter/templates/blocks/base/toolsGeneric.hbs", "/app/public/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/base/toolsGeneric.hbs");
    }
}
