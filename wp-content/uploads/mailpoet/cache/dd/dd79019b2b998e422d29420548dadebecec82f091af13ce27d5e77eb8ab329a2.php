<?php

/* emails/newSubscriberNotification.txt */
class __TwigTemplate_8bcd1c23635d1984c1e8f1aa1d622b7e89f736df4bbff4f5f4f33eff72da3ad8 extends Twig_Template
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
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Howdy,");
        echo "

";
        // line 3
        echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('MailPoet\Twig\I18n')->translate("The subscriber %\$1s has just subscribed to your list %\$2s!"), array("%\$1s" =>         // line 4
($context["subscriber_email"] ?? null), "%\$2s" => ($context["segments_names"] ?? null))), "html", null, true);
        // line 5
        echo "

";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cheers,");
        echo "
";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("The MailPoet Plugin");
        echo "

";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You can disable these emails in your MailPoet Settings.");
        echo "
";
        // line 11
        echo twig_escape_filter($this->env, ($context["link_settings"] ?? null), "html", null, true);
        echo "

";
        // line 13
        if ((twig_date_format_filter($this->env, "now", "Y-m-d") < twig_date_format_filter($this->env, "2018-11-30", "Y-m-d"))) {
            // line 14
            echo "    ";
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("PS. MailPoet annual plans are nearly half price for a limited time. Find out more in the Premium page in your admin.");
            echo "
    ";
            // line 15
            echo twig_escape_filter($this->env, ($context["link_premium"] ?? null), "html", null, true);
            echo "
";
        }
        // line 17
        echo "
";
    }

    public function getTemplateName()
    {
        return "emails/newSubscriberNotification.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  56 => 15,  51 => 14,  49 => 13,  44 => 11,  40 => 10,  35 => 8,  31 => 7,  27 => 5,  25 => 4,  24 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "emails/newSubscriberNotification.txt", "/app/public/wp-content/plugins/mailpoet/views/emails/newSubscriberNotification.txt");
    }
}
