<?php

/* mp2migration.html */
class __TwigTemplate_abac8026de3201911113246ce3aa72c26d75f385643344b35894cdde8d215a39 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "mp2migration.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'after_javascript' => array($this, 'block_after_javascript'),
            'translations' => array($this, 'block_translations'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"wrap mailpoet-about-wrap\">
  <h1>";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Welcome to MailPoet version 3!");
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "version", array()), "html", null, true);
        echo "</h1>

  <p class=\"about-text\">";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Before we start, we will first migrate your data automatically from your previous MailPoet to the new one.");
        echo "</p>

  <h3>";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("What will be kept in MailPoet 3");
        echo "</h3>
  <ul class=\"default-list\">
    <li><strong>";
        // line 12
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribers and lists");
        echo " <img draggable=\"false\" class=\"emoji\" alt=\"✔\" src=\"https://s.w.org/images/core/emoji/2.2.1/svg/2714.svg\"></strong></li>
    <li><strong>";
        // line 13
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Forms");
        echo " <img draggable=\"false\" class=\"emoji\" alt=\"✔\" src=\"https://s.w.org/images/core/emoji/2.2.1/svg/2714.svg\"></strong></li>
    <li><strong>";
        // line 14
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Settings");
        echo " <img draggable=\"false\" class=\"emoji\" alt=\"✔\" src=\"https://s.w.org/images/core/emoji/2.2.1/svg/2714.svg\"></strong></li>
    <li>";
        // line 15
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Archive of sent newsletters (will not be migrated)");
        echo "</li>
    <li>";
        // line 16
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Statistics (will not be migrated)");
        echo "</li>
  </ul>
  <div style=\"position: absolute; top: .2em; right: 0;\"></div>
  <hr />

  <div>
    <br />
    <div id=\"import-actions\">
      <input type=\"submit\" name=\"import\" id=\"import\" class=\"button button-primary\" value=\"";
        // line 24
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Start upgrade");
        echo "\"  />
      <input type=\"submit\" name=\"stop-import\" id=\"stop-import\" class=\"button button-secondary\" value=\"";
        // line 25
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Pause");
        echo "\" style=\"display: none\"/>
      <small> <a id=\"skip-import\" href=\"#\">";
        // line 26
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No thanks, I'll skip and start from scratch.");
        echo "</a></small>
      <br />
      <br />
    </div>

    <div id=\"progressbar\" class=\"mailpoet_progress mailpoet_progress_complete\" style=\"display: none\">
      <span id=\"progresslabel\" class=\"mailpoet_progress_label\">0%</span>
    </div>

    <div id=\"upgrade-completed\" style=\"display: none\">
      <h3>";
        // line 36
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Upgrade completed!");
        echo "</h3>
      <input type=\"button\" name=\"goto-welcome\" id=\"goto-welcome\" class=\"button button-primary\" value=\"";
        // line 37
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Go to MailPoet");
        echo "\"  />
    </div>

    <br />
    <div id=\"logger-container\" style=\"display: none\">
      <small><strong>";
        // line 42
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Log...");
        echo "</strong></small>
      <div id=\"logger\"></div>
    </div>

  </div>

</div>
";
    }

    // line 51
    public function block_after_javascript($context, array $blocks = array())
    {
        // line 52
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("mp2migrator.js");
        // line 54
        echo "
  <script type=\"text/javascript\">
    var mailpoet_mp2_migrator = {
      log_file_url: '";
        // line 57
        echo twig_escape_filter($this->env, ($context["log_file_url"] ?? null), "html", null, true);
        echo "',
      progress_url: '";
        // line 58
        echo twig_escape_filter($this->env, ($context["progress_url"] ?? null), "html", null, true);
        echo "'
    };
  </script>
";
    }

    // line 63
    public function block_translations($context, array $blocks = array())
    {
        // line 64
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(array("import_complete" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("IMPORT COMPLETE"), "importing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Importing…"), "import_stopped_by_user" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("IMPORT STOPPED BY USER")));
        // line 68
        echo "
";
    }

    public function getTemplateName()
    {
        return "mp2migration.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 68,  152 => 64,  149 => 63,  141 => 58,  137 => 57,  132 => 54,  129 => 52,  126 => 51,  114 => 42,  106 => 37,  102 => 36,  89 => 26,  85 => 25,  81 => 24,  70 => 16,  66 => 15,  62 => 14,  58 => 13,  54 => 12,  49 => 10,  44 => 8,  37 => 6,  33 => 4,  30 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mp2migration.html", "/app/public/wp-content/plugins/mailpoet/views/mp2migration.html");
    }
}
