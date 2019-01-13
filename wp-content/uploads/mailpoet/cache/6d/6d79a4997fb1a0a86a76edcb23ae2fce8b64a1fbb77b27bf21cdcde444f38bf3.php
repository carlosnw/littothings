<?php

/* settings/signup.html */
class __TwigTemplate_b8690088af0d6d74de78451703243bab25f0396479a6228fd4fa4ff14e98e160 extends Twig_Template
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
        echo "<table class=\"form-table\">
  <tbody>
    <!-- enable sign-up confirmation -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enable sign-up confirmation");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("If you enable this option, your subscribers will first receive a confirmation email after they subscribe. Once they confirm their subscription (via this email), they will be marked as 'confirmed' and will begin to receive your email newsletters.");
        echo "
          <a href=\"http://docs.mailpoet.com/article/128-why-you-should-use-signup-confirmation-double-opt-in\" target=\"_blank\">";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more about Double Opt-in confirmation.");
        echo "</a>
        </p>
      </th>
      <td>
        <p
          id=\"mailpoet_signup_confirmation_notice\"
          ";
        // line 17
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", array()) != "mailpoet")) {
            echo "style=\"display:none;\"";
        }
        // line 18
        echo "        >";
        // line 19
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign-up confirmation is mandatory when using the MailPoet Sending Service.");
        // line 20
        echo "</p>
        <p
          id=\"mailpoet_signup_confirmation_input\"
          ";
        // line 23
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", array()) == "mailpoet")) {
            echo "style=\"display:none;\"";
        }
        // line 24
        echo "        >
          <label>
            <input
              type=\"radio\"
              class=\"mailpoet_signup_confirmation\"
              data-automation-id=\"enable_signup_confirmation\"
              name=\"signup_confirmation[enabled]\"
              value=\"1\"
              ";
        // line 32
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "enabled", array())) {
            // line 33
            echo "                checked=\"checked\"
              ";
        }
        // line 35
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              class=\"mailpoet_signup_confirmation\"
              data-automation-id=\"disable_signup_confirmation\"
              name=\"signup_confirmation[enabled]\"
              value=\"\"
              ";
        // line 45
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "enabled", array())) {
            // line 46
            echo "                checked=\"checked\"
              ";
        }
        // line 48
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
      </td>
    </tr>
  </tbody>
</table>
<table id=\"mailpoet_signup_options\" class=\"form-table\">
  <tbody>
    <!-- sign-up confirmation: from name & email -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[signup_confirmation_from_name]\">
          ";
        // line 61
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("From");
        echo "
        </label>
      </th>
      <td>
        <p>
          <input
            type=\"text\"
            id=\"settings[signup_confirmation_from_name]\"
            name=\"signup_confirmation[from][name]\"
            data-automation-id=\"signup_confirmation_email_from_name\"
            value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "from", array()), "name", array()), "html", null, true);
        echo "\"
            placeholder=\"";
        // line 72
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your name");
        echo "\"
          />
          <input type=\"email\"
            id=\"settings[signup_confirmation_from_email]\"
            name=\"signup_confirmation[from][address]\"
            data-automation-id=\"signup_confirmation_email_from_email\"
            value=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "from", array()), "address", array()), "html", null, true);
        echo "\"
            placeholder=\"confirmation@mydomain.com\"
            size=\"28\"
          />
        </p>
      </td>
    </tr>
    <!-- sign-up confirmation: reply_to name & email -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[signup_confirmation_reply_name]\">
          ";
        // line 89
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reply-to");
        echo "
        </label>
      </th>
      <td>
        <p>
          <input
            type=\"text\"
            id=\"settings[signup_confirmation_reply_name]\"
            name=\"signup_confirmation[reply_to][name]\"
            value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "reply_to", array()), "name", array()), "html", null, true);
        echo "\"
            placeholder=\"";
        // line 99
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your name");
        echo "\"
            />
          <input type=\"email\"
            id=\"settings[signup_confirmation_reply_email]\"
            name=\"signup_confirmation[reply_to][address]\"
            value=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "reply_to", array()), "address", array()), "html", null, true);
        echo "\"
            placeholder=\"confirmation@mydomain.com\"
            size=\"28\"
            />
        </p>
      </td>
    </tr>
    <!-- confirmation email: title -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[signup_confirmation_email_subject]\">
        ";
        // line 115
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email subject");
        echo "
        </label>
      </th>
      <td>
        <input
          size=\"52\"
          type=\"text\"
          id=\"settings[signup_confirmation_email_subject]\"
          data-automation-id=\"signup_confirmation_email_subject\"
          name=\"signup_confirmation[subject]\"
          ";
        // line 125
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "subject", array())) {
            // line 126
            echo "            value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "subject", array()), "html", null, true);
            echo "\"
          ";
        }
        // line 128
        echo "        />
      </td>
    </tr>
    <!-- confirmation email: body -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[signup_confirmation_email_body]\">
          ";
        // line 135
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email content");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 138
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Don't forget to include:<br /><br />[activation_link]Confirm your subscription.[/activation_link]<br /><br />Optional: [lists_to_confirm].");
        echo "
        </p>
      </th>
      <td>
        <textarea
          cols=\"50\"
          rows=\"15\"
          id=\"settings[signup_confirmation_email_body]\"
          data-automation-id=\"signup_confirmation_email_body\"
          name=\"signup_confirmation[body]\"
        >";
        // line 148
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "body", array())) {
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", array()), "body", array()), "html", null, true);
        }
        // line 150
        echo "</textarea>
      </td>
    </tr>
    <!-- sign-up confirmation: confirmation page -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 157
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Confirmation page");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 160
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("When subscribers click on the activation link, they will be redirected to this page.");
        echo "
        </p>
      </th>
      <td>
        <p>
          <select
            class=\"mailpoet_page_selection\"
            name=\"subscription[pages][confirmation]\"
          >
            ";
        // line 169
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 170
            echo "              <option
                value=\"";
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute($context["page"], "id", array()), "html", null, true);
            echo "\"
                data-preview-url=\"";
            // line 172
            echo $this->getAttribute($this->getAttribute($context["page"], "url", array()), "confirm", array());
            echo "\"
                ";
            // line 173
            if (($this->getAttribute($context["page"], "id", array()) == $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "subscription", array()), "pages", array()), "confirmation", array()))) {
                // line 174
                echo "                  selected=\"selected\"
                ";
            }
            // line 176
            echo "              >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["page"], "title", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 178
        echo "          </select>
          <a
            class=\"mailpoet_page_preview\"
            href=\"javascript:;\"
            title=\"";
        // line 182
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview page");
        echo "\"
          >";
        // line 183
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview");
        echo "</a>
        </p>
      </td>
    </tr>
  </tbody>
</table>

<script type=\"text/javascript\">
  jQuery(function(\$) {
    // om dom loaded
    \$(function() {
      // double optin toggling
      toggleSignupOptions();

      \$('.mailpoet_signup_confirmation').on('click', function() {
        var result = false;

        if(~~(\$(this).val()) === 1) {
          result = confirm(\"";
        // line 201
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribers will need to activate their subscription via email in order to receive your newsletters. This is highly recommended!"), "js"), "html", null, true);
        echo "\");
        } else {
          result = confirm(\"";
        // line 203
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("New subscribers will be automatically confirmed, without having to confirm their subscription. This is not recommended!"), "js"), "html", null, true);
        echo "\");
        }
        // if the user confirmed changing the sign-up confirmation (yes/no)
        if(result === true) {
          // toggle signup options depending on the currently selected value
          toggleSignupOptions();
        }
        return result;
      });

      function toggleSignupOptions() {
        var is_enabled =
          (~~(\$('.mailpoet_signup_confirmation:checked').val()) === 1);
        \$('#mailpoet_signup_options')[(is_enabled) ? 'show' : 'hide']();
      }
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "settings/signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  341 => 203,  336 => 201,  315 => 183,  311 => 182,  305 => 178,  296 => 176,  292 => 174,  290 => 173,  286 => 172,  282 => 171,  279 => 170,  275 => 169,  263 => 160,  257 => 157,  248 => 150,  245 => 149,  243 => 148,  230 => 138,  224 => 135,  215 => 128,  209 => 126,  207 => 125,  194 => 115,  180 => 104,  172 => 99,  168 => 98,  156 => 89,  142 => 78,  133 => 72,  129 => 71,  116 => 61,  99 => 48,  95 => 46,  93 => 45,  79 => 35,  75 => 33,  73 => 32,  63 => 24,  59 => 23,  54 => 20,  52 => 19,  50 => 18,  46 => 17,  37 => 11,  33 => 10,  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "settings/signup.html", "/app/public/wp-content/plugins/mailpoet/views/settings/signup.html");
    }
}
