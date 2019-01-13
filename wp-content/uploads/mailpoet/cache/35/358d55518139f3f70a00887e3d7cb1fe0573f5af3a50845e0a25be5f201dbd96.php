<?php

/* emails/newSubscriberNotification.html */
class __TwigTemplate_c8a1aaaebbc53f7e3dfaebb0201fbc8fe913fbc433dcb9a6a2c47ab2147300a1 extends Twig_Template
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
        echo "<p>";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Howdy,");
        echo "

<p>";
        // line 3
        echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('MailPoet\Twig\I18n')->translate("The subscriber %\$1s has just subscribed to your list %\$2s!"), array("%\$1s" =>         // line 4
($context["subscriber_email"] ?? null), "%\$2s" => ($context["segments_names"] ?? null))), "html", null, true);
        // line 5
        echo "

<p>";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cheers,");
        echo "

<p>";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("The MailPoet Plugin");
        echo "

<p><small>";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate(MailPoet\Util\Helpers::replaceLinkTags("You can disable these emails in your [link]MailPoet Settings.[/link]",         // line 12
($context["link_settings"] ?? null)));
        // line 13
        echo "</small>

";
        // line 15
        if ((twig_date_format_filter($this->env, "now", "Y-m-d") < twig_date_format_filter($this->env, "2018-11-30", "Y-m-d"))) {
            // line 16
            echo "  <p>
    <small>
      ";
            // line 18
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate(MailPoet\Util\Helpers::replaceLinkTags("PS. MailPoet annual plans are nearly half price for a limited time.
      [link]Find out more in the Premium page in your admin.[/link]",             // line 20
($context["link_premium"] ?? null)));
            // line 21
            echo "
  </small>
";
        }
    }

    public function getTemplateName()
    {
        return "emails/newSubscriberNotification.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  57 => 20,  55 => 18,  51 => 16,  49 => 15,  45 => 13,  43 => 12,  42 => 11,  37 => 9,  32 => 7,  28 => 5,  26 => 4,  25 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "emails/newSubscriberNotification.html", "/app/public/wp-content/plugins/mailpoet/views/emails/newSubscriberNotification.html");
    }
}
