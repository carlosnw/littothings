<?php

/* newsletter/editor.html */
class __TwigTemplate_c3e2b25a5c82036f29affbf126691ef05956fc3b9639bc47a352a3dc05b6b7cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "newsletter/editor.html", 1);
        $this->blocks = array(
            'templates' => array($this, 'block_templates'),
            'content' => array($this, 'block_content'),
            'translations' => array($this, 'block_translations'),
            'after_css' => array($this, 'block_after_css'),
            'after_javascript' => array($this, 'block_after_javascript'),
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
    public function block_templates($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_tools_generic", "newsletter/templates/blocks/base/toolsGeneric.hbs");
        // line 7
        echo "
  ";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_block", "newsletter/templates/blocks/automatedLatestContent/block.hbs");
        // line 11
        echo "
  ";
        // line 12
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_widget", "newsletter/templates/blocks/automatedLatestContent/widget.hbs");
        // line 15
        echo "
  ";
        // line 16
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_settings", "newsletter/templates/blocks/automatedLatestContent/settings.hbs");
        // line 19
        echo "
  ";
        // line 20
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_block", "newsletter/templates/blocks/automatedLatestContentLayout/block.hbs");
        // line 23
        echo "
  ";
        // line 24
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_widget", "newsletter/templates/blocks/automatedLatestContentLayout/widget.hbs");
        // line 27
        echo "
  ";
        // line 28
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_automated_latest_content_layout_settings", "newsletter/templates/blocks/automatedLatestContentLayout/settings.hbs");
        // line 31
        echo "
  ";
        // line 32
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_button_block", "newsletter/templates/blocks/button/block.hbs");
        // line 35
        echo "
  ";
        // line 36
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_button_widget", "newsletter/templates/blocks/button/widget.hbs");
        // line 39
        echo "
  ";
        // line 40
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_button_settings", "newsletter/templates/blocks/button/settings.hbs");
        // line 43
        echo "
  ";
        // line 44
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_block", "newsletter/templates/blocks/container/block.hbs");
        // line 47
        echo "
  ";
        // line 48
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_block_empty", "newsletter/templates/blocks/container/emptyBlock.hbs");
        // line 51
        echo "
  ";
        // line 52
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_one_column_widget", "newsletter/templates/blocks/container/oneColumnLayoutWidget.hbs");
        // line 55
        echo "
  ";
        // line 56
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget.hbs");
        // line 59
        echo "
  ";
        // line 60
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_12_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget12.hbs");
        // line 63
        echo "
  ";
        // line 64
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_two_column_21_widget", "newsletter/templates/blocks/container/twoColumnLayoutWidget21.hbs");
        // line 67
        echo "
  ";
        // line 68
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_three_column_widget", "newsletter/templates/blocks/container/threeColumnLayoutWidget.hbs");
        // line 71
        echo "
  ";
        // line 72
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_settings", "newsletter/templates/blocks/container/settings.hbs");
        // line 75
        echo "
  ";
        // line 76
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_container_column_settings", "newsletter/templates/blocks/container/columnSettings.hbs");
        // line 79
        echo "
  ";
        // line 80
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_divider_block", "newsletter/templates/blocks/divider/block.hbs");
        // line 83
        echo "
  ";
        // line 84
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_divider_widget", "newsletter/templates/blocks/divider/widget.hbs");
        // line 87
        echo "
  ";
        // line 88
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_divider_settings", "newsletter/templates/blocks/divider/settings.hbs");
        // line 91
        echo "
  ";
        // line 92
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_footer_block", "newsletter/templates/blocks/footer/block.hbs");
        // line 95
        echo "
  ";
        // line 96
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_footer_widget", "newsletter/templates/blocks/footer/widget.hbs");
        // line 99
        echo "
  ";
        // line 100
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_footer_settings", "newsletter/templates/blocks/footer/settings.hbs");
        // line 103
        echo "
  ";
        // line 104
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_header_block", "newsletter/templates/blocks/header/block.hbs");
        // line 107
        echo "
  ";
        // line 108
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_header_widget", "newsletter/templates/blocks/header/widget.hbs");
        // line 111
        echo "
  ";
        // line 112
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_header_settings", "newsletter/templates/blocks/header/settings.hbs");
        // line 115
        echo "
  ";
        // line 116
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_image_block", "newsletter/templates/blocks/image/block.hbs");
        // line 119
        echo "
  ";
        // line 120
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_image_widget", "newsletter/templates/blocks/image/widget.hbs");
        // line 123
        echo "
  ";
        // line 124
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_image_settings", "newsletter/templates/blocks/image/settings.hbs");
        // line 127
        echo "
  ";
        // line 128
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_block", "newsletter/templates/blocks/posts/block.hbs");
        // line 131
        echo "
  ";
        // line 132
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_widget", "newsletter/templates/blocks/posts/widget.hbs");
        // line 135
        echo "
  ";
        // line 136
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings", "newsletter/templates/blocks/posts/settings.hbs");
        // line 139
        echo "
  ";
        // line 140
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_display_options", "newsletter/templates/blocks/posts/settingsDisplayOptions.hbs");
        // line 143
        echo "
  ";
        // line 144
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_selection", "newsletter/templates/blocks/posts/settingsSelection.hbs");
        // line 147
        echo "
  ";
        // line 148
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_selection_empty", "newsletter/templates/blocks/posts/settingsSelectionEmpty.hbs");
        // line 151
        echo "
  ";
        // line 152
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_posts_settings_single_post", "newsletter/templates/blocks/posts/settingsSinglePost.hbs");
        // line 155
        echo "
  ";
        // line 156
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_block", "newsletter/templates/blocks/social/block.hbs");
        // line 159
        echo "
  ";
        // line 160
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_block_icon", "newsletter/templates/blocks/social/blockIcon.hbs");
        // line 163
        echo "
  ";
        // line 164
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_widget", "newsletter/templates/blocks/social/widget.hbs");
        // line 167
        echo "
  ";
        // line 168
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_settings", "newsletter/templates/blocks/social/settings.hbs");
        // line 171
        echo "
  ";
        // line 172
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_icon", "newsletter/templates/blocks/social/settingsIcon.hbs");
        // line 175
        echo "
  ";
        // line 176
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_icon_selector", "newsletter/templates/blocks/social/settingsIconSelector.hbs");
        // line 179
        echo "
  ";
        // line 180
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_social_settings_styles", "newsletter/templates/blocks/social/settingsStyles.hbs");
        // line 183
        echo "
  ";
        // line 184
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_spacer_block", "newsletter/templates/blocks/spacer/block.hbs");
        // line 187
        echo "
  ";
        // line 188
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_spacer_widget", "newsletter/templates/blocks/spacer/widget.hbs");
        // line 191
        echo "
  ";
        // line 192
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_spacer_settings", "newsletter/templates/blocks/spacer/settings.hbs");
        // line 195
        echo "
  ";
        // line 196
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_text_block", "newsletter/templates/blocks/text/block.hbs");
        // line 199
        echo "
  ";
        // line 200
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_text_widget", "newsletter/templates/blocks/text/widget.hbs");
        // line 203
        echo "
  ";
        // line 204
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_text_settings", "newsletter/templates/blocks/text/settings.hbs");
        // line 207
        echo "
  ";
        // line 208
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_heading", "newsletter/templates/components/heading.hbs");
        // line 211
        echo "
  ";
        // line 212
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_save", "newsletter/templates/components/save.hbs");
        // line 215
        echo "
  ";
        // line 216
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_styles", "newsletter/templates/components/styles.hbs");
        // line 219
        echo "
  ";
        // line 220
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_newsletter_preview", "newsletter/templates/components/newsletterPreview.hbs");
        // line 223
        echo "
  ";
        // line 224
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_sidebar", "newsletter/templates/components/sidebar/sidebar.hbs");
        // line 227
        echo "
  ";
        // line 228
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_content", "newsletter/templates/components/sidebar/content.hbs");
        // line 231
        echo "
  ";
        // line 232
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_layout", "newsletter/templates/components/sidebar/layout.hbs");
        // line 235
        echo "
  ";
        // line 236
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_preview", "newsletter/templates/components/sidebar/preview.hbs");
        // line 239
        echo "
  ";
        // line 240
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "newsletter_editor_template_sidebar_styles", "newsletter/templates/components/sidebar/styles.hbs");
        // line 243
        echo "
";
    }

    // line 246
    public function block_content($context, array $blocks = array())
    {
        // line 247
        echo "<!-- Hidden heading for notices to appear under -->
<h1 style=\"display:none\">";
        // line 248
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Newsletter Editor");
        echo "</h1>
<div id=\"mailpoet_editor\">
  <div id=\"mailpoet_editor_breadcrumb\" class=\"mailpoet_breadcrumbs\"></div>
  <div id=\"mailpoet_editor_announcement\" class=\"mailpoet_editor_announcement\"></div>
  <div id=\"mailpoet_editor_top\"></div>
  <div id=\"mailpoet_editor_heading\"></div>
  <div class=\"clearfix\"></div>
  <div id=\"mailpoet_editor_main_wrapper\">
    <div id=\"mailpoet_editor_styles\"></div>
    <div id=\"mailpoet_editor_content_container\">
      <div class=\"mailpoet_newsletter_wrapper\">
        <div id=\"mailpoet_editor_content\"></div>
      </div>
    </div>
    <div id=\"mailpoet_editor_sidebar\"></div>
    <div class=\"clear\"></div>
  </div>
  <div id=\"mailpoet_editor_bottom\"></div>

  <div class=\"mailpoet_layer_overlay\" style=\"display:none;\"></div>

  <div id=\"wp-link-backdrop\" style=\"display: none\"></div>
  <div
    id=\"wp-link-wrap\"
    class=\"wp-core-ui search-panel-visible\"
    style=\"display: none\"
  >
  <form id=\"wp-link\" tabindex=\"-1\">
    ";
        // line 276
        echo wp_nonce_field("internal-linking", "_ajax_linking_nonce", false);
        echo "
    <div id=\"link-modal-title\">
      ";
        // line 278
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Insert/edit link");
        echo "
      <div id=\"wp-link-close\" tabindex=\"0\"></div>
    </div>
    <div id=\"link-selector\">
      <div id=\"link-options\">
        <div>
          <label>
            <span>";
        // line 285
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Type");
        echo "</span>
            <select id=\"url-type-field\" name=\"urltype\">
              <option value=\"http://\">";
        // line 287
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link to a web page");
        echo "</option>
              <option value=\"[viewInBrowserUrl]\">";
        // line 288
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Browser version");
        echo "</option>
              <option value=\"[unsubscribeUrl]\">";
        // line 289
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unsubcribe page");
        echo "</option>
              <option value=\"[manageSubscriptionUrl]\">";
        // line 290
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage your subscription page");
        echo "</option>
            </select>
          </label>
        </div>
        <div id=\"link-href-field\">
          <label><span>";
        // line 295
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link");
        echo "</span><input id=\"url-field\" type=\"text\" name=\"href\" /></label>
        </div>
        <div class=\"mailpoet_hidden\">
          <label><span>";
        // line 298
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title");
        echo "</span><input id=\"link-title-field\" type=\"text\" name=\"linktitle\" /></label>
        </div>
        <div class=\"link-target mailpoet_hidden\">
          <label><span>&nbsp;</span><input type=\"checkbox\" id=\"link-target-checkbox\" /> ";
        // line 301
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Open link in a new window/tab");
        echo "</label>
        </div>
      </div>
      <div id=\"search-panel\">
        <div class=\"link-search-wrapper\">
          <label>
            <span class=\"search-label\">";
        // line 307
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Search your content");
        echo "</span>
            <input type=\"search\" id=\"search-field\" class=\"link-search-field\" autocomplete=\"off\" />
            <span class=\"spinner\"></span>
          </label>
        </div>
        <div id=\"search-results\" class=\"query-results\">
          <ul></ul>
          <div class=\"river-waiting\">
            <span class=\"spinner\"></span>
          </div>
        </div>
        <div id=\"most-recent-results\" class=\"query-results\">
          <div class=\"query-notice\"><em>";
        // line 319
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No search term specified. Showing recent items.");
        echo "</em></div>
          <ul></ul>
          <div class=\"river-waiting\">
            <span class=\"spinner\"></span>
          </div>
        </div>
      </div>
    </div>
    <div class=\"submitbox\">
      <div id=\"wp-link-update\">
        <input type=\"submit\" value=\"";
        // line 329
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add Link");
        echo "\" class=\"button button-primary\" id=\"wp-link-submit\" name=\"wp-link-submit\">
      </div>
      <div id=\"wp-link-cancel\">
        <a class=\"submitdelete deletion\" href=\"#\">";
        // line 332
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cancel");
        echo "</a>
      </div>
    </div>
  </form>
</div>
";
    }

    // line 339
    public function block_translations($context, array $blocks = array())
    {
        // line 340
        echo "  ";
        $context["helpTooltipSendPreview"] = twig_escape_filter($this->env, MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("Didn't receive the test email? Read our [link]quick guide[/link] to sending issues. <br><br>A MailPoet logo will appear in the footer of all emails sent with the free version of MailPoet."), "http://beta.docs.mailpoet.com/article/146-my-newsletters-are-not-being-received", array("target" => "_blank")), "js");
        // line 343
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(array("failedToFetchAvailablePosts" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Failed to fetch available posts"), "failedToFetchRenderedPosts" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Failed to fetch rendered posts"), "shortcodesWindowTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select a shortcode"), "unsubscribeLinkMissing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All emails must include an \"Unsubscribe\" link. Add a footer widget to your email to continue."), "automatedLatestContentMissing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please add an \"Automated Latest Content\" widget to the email from the right sidebar."), "newsletterPreviewEmailMissing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enter an email address to send the preview newsletter to."), "newsletterPreviewSent" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your test email has been sent!"), "templateNameMissing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please add a template name"), "helpTooltipSendPreview" =>         // line 352
($context["helpTooltipSendPreview"] ?? null), "helpTooltipDesignerSubjectLine" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("You can add MailPoet shortcodes here. For example, you can add your subscribers' first names by using this shortcode: [subscriber:firstname | default:reader]. Simply copy and paste the shortcode into the field."), "helpTooltipDesignerPreheader" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This optional text will appear in your subscribers' inboxes, beside the subject line. Write something enticing!"), "helpTooltipDesignerFullWidth" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This option eliminates padding around the image. It only works if the image is larger than the column size."), "helpTooltipDesignerIdealWidth" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Use images with widths of at least 1,000 pixels to ensure sharp display on high density screens, like mobile devices."), "templateSaved" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Template has been saved."), "templateSaveFailed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Template has not been saved, please try again"), "categoriesAndTags" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Categories & tags"), "noPostsToDisplay" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("There is no content to display."), "previewShouldOpenInNewTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your preview should open in a new tab. Please ensure your browser is not blocking popups from this page."), "newsletterPreview" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Newsletter Preview"), "newsletterBodyIsCorrupted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Contents of this newsletter are corrupted and may be lost, you may need to add new content to this newsletter, or create a new one. If possible, please contact us and report this issue."), "saving" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Saving..."), "unsavedChangesWillBeLost" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("There are unsaved changes which will be lost if you leave this page."), "selectColor" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Select", "select color"), "cancelColorSelection" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Cancel", "cancel color selection"), "newsletterIsPaused" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email sending has been paused."), "tutorialVideoTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Before you start, this how you drag and drop in MailPoet"), "announcementBackgroundImagesHeading" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Hey %username%, you can now put text over any image."), "announcementBackgroundImagesMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Simply edit any column block to add a background image. It works in pretty much every email client, even on mobile."), "selectType" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select type"), "events" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Events"), "conditions" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Conditions", "Configuration options for automatic email events"), "template" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Template"), "designer" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Designer"), "send" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send")));
        // line 378
        echo "
";
    }

    // line 381
    public function block_after_css($context, array $blocks = array())
    {
        // line 382
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("newsletter_editor.css");
        // line 384
        echo "
";
    }

    // line 387
    public function block_after_javascript($context, array $blocks = array())
    {
        // line 388
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("lib/tinymce/tinymce.min.js", "lib/tinymce/jquery.tinymce.min.js", "lib/mailpoet_shortcodes/plugin.js", "lib/wplink/plugin.js", "newsletter_editor.js");
        // line 394
        echo "

  ";
        // line 396
        echo do_action("mailpoet_newsletter_editor_after_javascript");
        echo "

  <script type=\"text/javascript\">
    function renderWithFont(node) {
      if (!node.element) return node.text;
      var \$wrapper = \$('<span></span>');
      \$wrapper.css({'font-family': Handlebars.helpers.fontWithFallback(node.element.value)});
      \$wrapper.text(node.text);
      return \$wrapper;
    }
    function fontsSelect(selector) {
      jQuery(selector).select2({
        minimumResultsForSearch: Infinity,
        templateSelection: renderWithFont,
        templateResult: renderWithFont
      });
    }

    var templates = {
      styles: Handlebars.compile(
        jQuery('#newsletter_editor_template_styles').html()
      ),
      save: Handlebars.compile(
        jQuery('#newsletter_editor_template_save').html()
      ),
      heading: Handlebars.compile(
        jQuery('#newsletter_editor_template_heading').html()
      ),

      sidebar: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar').html()
      ),
      sidebarContent: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_content').html()
      ),
      sidebarLayout: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_layout').html()
      ),
      sidebarStyles: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_styles').html()
      ),
      sidebarPreview: Handlebars.compile(
        jQuery('#newsletter_editor_template_sidebar_preview').html()
      ),
      newsletterPreview: Handlebars.compile(
        jQuery('#newsletter_editor_template_newsletter_preview').html()
      ),

      genericBlockTools: Handlebars.compile(
        jQuery('#newsletter_editor_template_tools_generic').html()
      ),

      containerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_block').html()
      ),
      containerEmpty: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_block_empty').html()
      ),
      oneColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_one_column_widget').html()
      ),
      twoColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_widget').html()
      ),
      twoColumn12LayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_12_widget').html()
      ),
      twoColumn21LayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_two_column_21_widget').html()
      ),
      threeColumnLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_three_column_widget').html()
      ),
      containerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_settings').html()
      ),
      containerBlockColumnSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_container_column_settings').html()
      ),

      buttonBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_block').html()
      ),
      buttonInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_widget').html()
      ),
      buttonBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_button_settings').html()
      ),

      dividerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_block').html()
      ),
      dividerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_widget').html()
      ),
      dividerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_divider_settings').html()
      ),

      footerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_block').html()
      ),
      footerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_widget').html()
      ),
      footerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_footer_settings').html()
      ),

      headerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_block').html()
      ),
      headerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_widget').html()
      ),
      headerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_header_settings').html()
      ),

      imageBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_block').html()
      ),
      imageInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_widget').html()
      ),
      imageBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_image_settings').html()
      ),

      socialBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_block').html()
      ),
      socialIconBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_block_icon').html()
      ),
      socialInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_widget').html()
      ),
      socialBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings').html()
      ),
      socialSettingsIconSelector: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_icon_selector').html()
      ),
      socialSettingsIcon: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_icon').html()
      ),
      socialSettingsStyles: Handlebars.compile(
        jQuery('#newsletter_editor_template_social_settings_styles').html()
      ),

      spacerBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_block').html()
      ),
      spacerInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_widget').html()
      ),
      spacerBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_spacer_settings').html()
      ),

      automatedLatestContentBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_block').html()
      ),
      automatedLatestContentInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_widget').html()
      ),
      automatedLatestContentBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_settings').html()
      ),

      automatedLatestContentLayoutBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_block').html()
      ),
      automatedLatestContentLayoutInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_widget').html()
      ),
      automatedLatestContentLayoutBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_automated_latest_content_layout_settings').html()
      ),

      postsBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_block').html()
      ),
      postsInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_widget').html()
      ),
      postsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings').html()
      ),
      postSelectionPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_selection').html()
      ),
      emptyPostPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_selection_empty').html()
      ),
      singlePostPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_single_post').html()
      ),
      displayOptionsPostsBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_posts_settings_display_options').html()
      ),

      textBlock: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_block').html()
      ),
      textInsertion: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_widget').html()
      ),
      textBlockSettings: Handlebars.compile(
        jQuery('#newsletter_editor_template_text_settings').html()
      )
    };

    var config = {
      availableStyles: {
        textSizes: [
          '9px', '10px', '11px', '12px', '13px', '14px', '15px', '16px',
          '17px', '18px', '19px', '20px', '21px', '22px', '23px', '24px'
        ],
        headingSizes: [
          '10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px',
          '26px', '30px', '36px', '40px'
        ],
        fonts: {
          standard: [
            'Arial',
            'Comic Sans MS',
            'Courier New',
            'Georgia',
            'Lucida',
            'Tahoma',
            'Times New Roman',
            'Trebuchet MS',
            'Verdana'
          ],
          custom: [
            'Arvo',
            'Lato',
            'Lora',
            'Merriweather',
            'Merriweather Sans',
            'Noticia Text',
            'Open Sans',
            'Playfair Display',
            'Roboto',
            'Source Sans Pro'
          ]
        },
        socialIconSets: {
          'default': {
            'custom': '";
        // line 648
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 650
        echo "',
            'facebook': '";
        // line 651
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Facebook.png");
        // line 653
        echo "',
            'twitter': '";
        // line 654
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Twitter.png");
        // line 656
        echo "',
            'google-plus': '";
        // line 657
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Google-Plus.png");
        // line 659
        echo "',
            'youtube': '";
        // line 660
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Youtube.png");
        // line 662
        echo "',
            'website': '";
        // line 663
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Website.png");
        // line 665
        echo "',
            'email': '";
        // line 666
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Email.png");
        // line 668
        echo "',
            'instagram': '";
        // line 669
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Instagram.png");
        // line 671
        echo "',
            'pinterest': '";
        // line 672
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Pinterest.png");
        // line 674
        echo "',
            'linkedin': '";
        // line 675
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/LinkedIn.png");
        // line 677
        echo "'
          },
          'grey': {
            'custom': '";
        // line 680
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 682
        echo "',
            'facebook': '";
        // line 683
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Facebook.png");
        // line 685
        echo "',
            'twitter': '";
        // line 686
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Twitter.png");
        // line 688
        echo "',
            'google-plus': '";
        // line 689
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Google-Plus.png");
        // line 691
        echo "',
            'youtube': '";
        // line 692
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Youtube.png");
        // line 694
        echo "',
            'website': '";
        // line 695
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Website.png");
        // line 697
        echo "',
            'email': '";
        // line 698
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Email.png");
        // line 700
        echo "',
            'instagram': '";
        // line 701
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Instagram.png");
        // line 703
        echo "',
            'pinterest': '";
        // line 704
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/Pinterest.png");
        // line 706
        echo "',
            'linkedin': '";
        // line 707
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/02-grey/LinkedIn.png");
        // line 709
        echo "',
          },
          'circles': {
            'custom': '";
        // line 712
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 714
        echo "',
            'facebook': '";
        // line 715
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Facebook.png");
        // line 717
        echo "',
            'twitter': '";
        // line 718
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Twitter.png");
        // line 720
        echo "',
            'google-plus': '";
        // line 721
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Google-Plus.png");
        // line 723
        echo "',
            'youtube': '";
        // line 724
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Youtube.png");
        // line 726
        echo "',
            'website': '";
        // line 727
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Website.png");
        // line 729
        echo "',
            'email': '";
        // line 730
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Email.png");
        // line 732
        echo "',
            'instagram': '";
        // line 733
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Instagram.png");
        // line 735
        echo "',
            'pinterest': '";
        // line 736
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/Pinterest.png");
        // line 738
        echo "',
            'linkedin': '";
        // line 739
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/03-circles/LinkedIn.png");
        // line 741
        echo "',
          },
          'full-flat-roundrect': {
            'custom': '";
        // line 744
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 746
        echo "',
            'facebook': '";
        // line 747
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Facebook.png");
        // line 749
        echo "',
            'twitter': '";
        // line 750
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Twitter.png");
        // line 752
        echo "',
            'google-plus': '";
        // line 753
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Google-Plus.png");
        // line 755
        echo "',
            'youtube': '";
        // line 756
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Youtube.png");
        // line 758
        echo "',
            'website': '";
        // line 759
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Website.png");
        // line 761
        echo "',
            'email': '";
        // line 762
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Email.png");
        // line 764
        echo "',
            'instagram': '";
        // line 765
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Instagram.png");
        // line 767
        echo "',
            'pinterest': '";
        // line 768
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/Pinterest.png");
        // line 770
        echo "',
            'linkedin': '";
        // line 771
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/04-full-flat-roundrect/LinkedIn.png");
        // line 773
        echo "',
          },
          'full-gradient-square': {
            'custom': '";
        // line 776
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 778
        echo "',
            'facebook': '";
        // line 779
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Facebook.png");
        // line 781
        echo "',
            'twitter': '";
        // line 782
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Twitter.png");
        // line 784
        echo "',
            'google-plus': '";
        // line 785
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Google-Plus.png");
        // line 787
        echo "',
            'youtube': '";
        // line 788
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Youtube.png");
        // line 790
        echo "',
            'website': '";
        // line 791
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Website.png");
        // line 793
        echo "',
            'email': '";
        // line 794
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Email.png");
        // line 796
        echo "',
            'instagram': '";
        // line 797
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Instagram.png");
        // line 799
        echo "',
            'pinterest': '";
        // line 800
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/Pinterest.png");
        // line 802
        echo "',
            'linkedin': '";
        // line 803
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/05-full-gradient-square/LinkedIn.png");
        // line 805
        echo "',
          },
          'full-symbol-color': {
            'custom': '";
        // line 808
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 810
        echo "',
            'facebook': '";
        // line 811
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Facebook.png");
        // line 813
        echo "',
            'twitter': '";
        // line 814
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Twitter.png");
        // line 816
        echo "',
            'google-plus': '";
        // line 817
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Google-Plus.png");
        // line 819
        echo "',
            'youtube': '";
        // line 820
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Youtube.png");
        // line 822
        echo "',
            'website': '";
        // line 823
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Website.png");
        // line 825
        echo "',
            'email': '";
        // line 826
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Email.png");
        // line 828
        echo "',
            'instagram': '";
        // line 829
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Instagram.png");
        // line 831
        echo "',
            'pinterest': '";
        // line 832
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/Pinterest.png");
        // line 834
        echo "',
            'linkedin': '";
        // line 835
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/06-full-symbol-color/LinkedIn.png");
        // line 837
        echo "',
          },
          'full-symbol-black': {
            'custom': '";
        // line 840
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 842
        echo "',
            'facebook': '";
        // line 843
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Facebook.png");
        // line 845
        echo "',
            'twitter': '";
        // line 846
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Twitter.png");
        // line 848
        echo "',
            'google-plus': '";
        // line 849
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Google-Plus.png");
        // line 851
        echo "',
            'youtube': '";
        // line 852
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Youtube.png");
        // line 854
        echo "',
            'website': '";
        // line 855
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Website.png");
        // line 857
        echo "',
            'email': '";
        // line 858
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Email.png");
        // line 860
        echo "',
            'instagram': '";
        // line 861
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Instagram.png");
        // line 863
        echo "',
            'pinterest': '";
        // line 864
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/Pinterest.png");
        // line 866
        echo "',
            'linkedin': '";
        // line 867
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/07-full-symbol-black/LinkedIn.png");
        // line 869
        echo "',
          },
          'full-symbol-grey': {
            'custom': '";
        // line 872
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 874
        echo "',
            'facebook': '";
        // line 875
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Facebook.png");
        // line 877
        echo "',
            'twitter': '";
        // line 878
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Twitter.png");
        // line 880
        echo "',
            'google-plus': '";
        // line 881
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Google-Plus.png");
        // line 883
        echo "',
            'youtube': '";
        // line 884
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Youtube.png");
        // line 886
        echo "',
            'website': '";
        // line 887
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Website.png");
        // line 889
        echo "',
            'email': '";
        // line 890
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Email.png");
        // line 892
        echo "',
            'instagram': '";
        // line 893
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Instagram.png");
        // line 895
        echo "',
            'pinterest': '";
        // line 896
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/Pinterest.png");
        // line 898
        echo "',
            'linkedin': '";
        // line 899
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/08-full-symbol-grey/LinkedIn.png");
        // line 901
        echo "',
          },
          'line-roundrect': {
            'custom': '";
        // line 904
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 906
        echo "',
            'facebook': '";
        // line 907
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Facebook.png");
        // line 909
        echo "',
            'twitter': '";
        // line 910
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Twitter.png");
        // line 912
        echo "',
            'google-plus': '";
        // line 913
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Google-Plus.png");
        // line 915
        echo "',
            'youtube': '";
        // line 916
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Youtube.png");
        // line 918
        echo "',
            'website': '";
        // line 919
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Website.png");
        // line 921
        echo "',
            'email': '";
        // line 922
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Email.png");
        // line 924
        echo "',
            'instagram': '";
        // line 925
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Instagram.png");
        // line 927
        echo "',
            'pinterest': '";
        // line 928
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/Pinterest.png");
        // line 930
        echo "',
            'linkedin': '";
        // line 931
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/09-line-roundrect/LinkedIn.png");
        // line 933
        echo "',
          },
          'line-square': {
            'custom': '";
        // line 936
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/custom.png");
        // line 938
        echo "',
            'facebook': '";
        // line 939
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Facebook.png");
        // line 941
        echo "',
            'twitter': '";
        // line 942
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Twitter.png");
        // line 944
        echo "',
            'google-plus': '";
        // line 945
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Google-Plus.png");
        // line 947
        echo "',
            'youtube': '";
        // line 948
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Youtube.png");
        // line 950
        echo "',
            'website': '";
        // line 951
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Website.png");
        // line 953
        echo "',
            'email': '";
        // line 954
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Email.png");
        // line 956
        echo "',
            'instagram': '";
        // line 957
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Instagram.png");
        // line 959
        echo "',
            'pinterest': '";
        // line 960
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/Pinterest.png");
        // line 962
        echo "',
            'linkedin': '";
        // line 963
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/10-line-square/LinkedIn.png");
        // line 965
        echo "',
          },
        },
        dividers: [
          'hidden',
          'dotted',
          'dashed',
          'solid',
          'double',
          'groove',
          'ridge'
        ]
      },
      socialIcons: {
        'facebook': {
          title: 'Facebook',
          linkFieldName: '";
        // line 981
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://www.facebook.com',
        },
        'twitter': {
          title: 'Twitter',
          linkFieldName: '";
        // line 986
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://www.twitter.com',
        },
        'google-plus': {
          title: 'Google Plus',
          linkFieldName: '";
        // line 991
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://plus.google.com',
        },
        'youtube': {
          title: 'Youtube',
          linkFieldName: '";
        // line 996
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://www.youtube.com',
        },
        'website': {
          title: '";
        // line 1000
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Website"), "js"), "html", null, true);
        echo "',
          linkFieldName: '";
        // line 1001
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: '',
        },
        'email': {
          title: '";
        // line 1005
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email"), "js"), "html", null, true);
        echo "',
          linkFieldName: '";
        // line 1006
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email"), "js"), "html", null, true);
        echo "',
          defaultLink: '',
        },
        'instagram': {
          title: 'Instagram',
          linkFieldName: '";
        // line 1011
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://instagram.com',
        },
        'pinterest': {
          title: 'Pinterest',
          linkFieldName: '";
        // line 1016
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://www.pinterest.com',
        },
        'linkedin': {
          title: 'LinkedIn',
          linkFieldName: '";
        // line 1021
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: 'http://www.linkedin.com',
        },
        'custom': {
          title: '";
        // line 1025
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom"), "js"), "html", null, true);
        echo "',
          linkFieldName: '";
        // line 1026
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link"), "js"), "html", null, true);
        echo "',
          defaultLink: '',
        },
      },
      blockDefaults: {
        automatedLatestContent: {
          amount: '5',
          withLayout: false,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'belowTitle', // 'belowTitle'|'aboveTitle'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1043
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Author:"), "js"), "html", null, true);
        echo "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1045
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Categories:"), "js"), "html", null, true);
        echo "',
          readMoreType: 'button', // 'link'|'button'
          readMoreText: '";
        // line 1047
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
          readMoreButton: {
            text: '";
        // line 1049
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
            url: '[postLink]',
            context: 'automatedLatestContent.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              }
            }
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'automatedLatestContent.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        automatedLatestContentLayout: {
          amount: '5',
          withLayout: true,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1098
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Author:"), "js"), "html", null, true);
        echo "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1100
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Categories:"), "js"), "html", null, true);
        echo "',
          readMoreType: 'button', // 'link'|'button'
          readMoreText: '";
        // line 1102
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
          readMoreButton: {
            text: '";
        // line 1104
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
            url: '[postLink]',
            context: 'automatedLatestContentLayout.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              }
            }
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'automatedLatestContentLayout.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        button: {
          text: '";
        // line 1142
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Button"), "js"), "html", null, true);
        echo "',
          url: '',
          styles: {
            block: {
              backgroundColor: '#2ea1cd',
              borderColor: '#0074a2',
              borderWidth: '1px',
              borderRadius: '5px',
              borderStyle: 'solid',
              width: '180px',
              lineHeight: '40px',
              fontColor: '#ffffff',
              fontFamily: 'Verdana',
              fontSize: '18px',
              fontWeight: 'normal',
              textAlign: 'center',
            },
          },
        },
        container: {
          image: {
            src: null,
            display: 'scale',
          },
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
          },
        },
        divider: {
          styles: {
            block: {
              backgroundColor: 'transparent',
              padding: '13px',
              borderStyle: 'solid',
              borderWidth: '3px',
              borderColor: '#aaaaaa',
            },
          },
        },
        footer: {
          text: '<p><a href=\"[link:subscription_unsubscribe_url]\">";
        // line 1184
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unsubscribe");
        echo "</a> | <a href=\"[link:subscription_manage_url]\">";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage subscription");
        echo "</a><br />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add your postal address here!");
        echo "</p>',
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
            text: {
              fontColor: '#222222',
              fontFamily: 'Arial',
              fontSize: '12px',
              textAlign: 'center',
            },
            link: {
              fontColor: '#6cb7d4',
              textDecoration: 'none',
            },
          },
        },
        image: {
          link: '',
          src: '',
          alt: '";
        // line 1204
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("An image of..."), "js"), "html", null, true);
        echo "',
          fullWidth: false,
          width: '281px',
          height: '190px',
          styles: {
            block: {
              textAlign: 'center',
            },
          },
        },
        posts: {
          amount: '10',
          withLayout: true,
          contentType: 'post', // 'post'|'page'|'mailpoet_page'
          postStatus: 'publish', // 'draft'|'pending'|'private'|'publish'|'future'
          inclusionType: 'include', // 'include'|'exclude'
          displayType: 'excerpt', // 'excerpt'|'full'|'titleOnly'
          titleFormat: 'h1', // 'h1'|'h2'|'h3'|'ul'
          titleAlignment: 'left', // 'left'|'center'|'right'
          titleIsLink: false, // false|true
          imageFullWidth: false, // true|false
          featuredImagePosition: 'alternate', // 'centered'|'left'|'right'|'alternate'|'none',
          showAuthor: 'no', // 'no'|'aboveText'|'belowText'
          authorPrecededBy: '";
        // line 1227
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Author:"), "js"), "html", null, true);
        echo "',
          showCategories: 'no', // 'no'|'aboveText'|'belowText'
          categoriesPrecededBy: '";
        // line 1229
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Categories:"), "js"), "html", null, true);
        echo "',
          readMoreType: 'link', // 'link'|'button'
          readMoreText: '";
        // line 1231
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
          readMoreButton: {
            text: '";
        // line 1233
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more"), "js"), "html", null, true);
        echo "',
            url: '[postLink]',
            context: 'posts.readMoreButton',
            styles: {
              block: {
                backgroundColor: '#2ea1cd',
                borderColor: '#0074a2',
                borderWidth: '1px',
                borderRadius: '5px',
                borderStyle: 'solid',
                width: '180px',
                lineHeight: '40px',
                fontColor: '#ffffff',
                fontFamily: 'Verdana',
                fontSize: '18px',
                fontWeight: 'normal',
                textAlign: 'center',
              },
            },
          },
          sortBy: 'newest', // 'newest'|'oldest',
          showDivider: true, // true|false
          divider: {
            context: 'posts.divider',
            styles: {
              block: {
                backgroundColor: 'transparent',
                padding: '13px',
                borderStyle: 'solid',
                borderWidth: '3px',
                borderColor: '#aaaaaa',
              },
            },
          },
          backgroundColor: '#ffffff',
          backgroundColorAlternate: '#eeeeee',
        },
        social: {
          iconSet: 'default',
          icons: [
          {
            type: 'socialIcon',
            iconType: 'facebook',
            link: 'http://www.facebook.com',
            image: '";
        // line 1277
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Facebook.png");
        // line 1279
        echo "',
            height: '32px',
            width: '32px',
            text: '";
        // line 1282
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Facebook"), "js"), "html", null, true);
        echo "',
          },
          {
            type: 'socialIcon',
            iconType: 'twitter',
            link: 'http://www.twitter.com',
            image: '";
        // line 1288
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/social-icons/01-social/Twitter.png");
        // line 1290
        echo "',
            height: '32px',
            width: '32px',
            text: '";
        // line 1293
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Twitter"), "js"), "html", null, true);
        echo "',
          },
          ],
        },
        spacer: {
          styles: {
            block: {
              backgroundColor: 'transparent',
              height: '40px',
            },
          },
        },
        text: {
          text: '";
        // line 1306
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Edit this to insert text."), "js"), "html", null, true);
        echo "',
        },
        header: {
          text: '";
        // line 1309
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display problems?"), "js"), "html", null, true);
        echo "&nbsp;' +
            '<a href=\"[link:newsletter_view_in_browser_url]\">";
        // line 1310
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Open this email in your web browser.");
        echo "</a>',
          styles: {
            block: {
              backgroundColor: 'transparent',
            },
            text: {
              fontColor: '#222222',
              fontFamily: 'Arial',
              fontSize: '12px',
              textAlign: 'center',
            },
            link: {
              fontColor: '#6cb7d4',
              textDecoration: 'underline',
            },
          },
        },
      },
      shortcodes: ";
        // line 1328
        echo json_encode(($context["shortcodes"] ?? null));
        echo ",
      sidepanelWidth: '331px',
      newsletterPreview: {
        width: '1024px',
        height: '768px',
        previewTypeLocalStorageKey: 'newsletter_editor.preview_type'
      },
      validation: {
        validateUnsubscribeLinkPresent: ";
        // line 1336
        echo ((($context["mss_active"] ?? null)) ? ("true") : ("false"));
        echo ",
      },
      urls: {
        send: '";
        // line 1339
        echo admin_url(("admin.php?page=mailpoet-newsletters#/send/" . intval($this->env->getExtension('MailPoet\Twig\Functions')->params("id"))));
        echo "',
        imageMissing: '";
        // line 1340
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateImageUrl("newsletter_editor/image-missing.svg");
        // line 1342
        echo "',
      },
      dragDemoUrl: '";
        // line 1344
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("newsletter-editor/editor-drag-demo.20181121-1440.mp4");
        echo "',
      backgroundImageDemoUrl: '";
        // line 1345
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("newsletter-editor/background-image-demo.20181121-1440.mp4");
        echo "',
      currentUserId: '";
        // line 1346
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_wp_user"] ?? null), "wp_user_id", array()), "html", null, true);
        echo "',
      currentUserFirstName: '";
        // line 1347
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_wp_user"] ?? null), "first_name", array()), "html", null, true);
        echo "',
      currentUserUsername: '";
        // line 1348
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_wp_user"] ?? null), "login", array()), "html", null, true);
        echo "',
      dragDemoUrlSettings: '";
        // line 1349
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), ("user_seen_editor_tutorial" . $this->getAttribute(($context["current_wp_user"] ?? null), "wp_user_id", array())), array(), "array"), "html", null, true);
        echo "',
      installedAt: '";
        // line 1350
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "installed_at", array(), "array"), "html", null, true);
        echo "',
    };
    var mailpoet_in_app_announcements = ";
        // line 1352
        echo json_encode($this->getAttribute(($context["settings"] ?? null), "in_app_announcements", array()));
        echo ";
    wp.hooks.doAction('mailpoet_newsletters_editor_initialize', config);

  </script>
";
    }

    public function getTemplateName()
    {
        return "newsletter/editor.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1814 => 1352,  1809 => 1350,  1805 => 1349,  1801 => 1348,  1797 => 1347,  1793 => 1346,  1789 => 1345,  1785 => 1344,  1781 => 1342,  1779 => 1340,  1775 => 1339,  1769 => 1336,  1758 => 1328,  1737 => 1310,  1733 => 1309,  1727 => 1306,  1711 => 1293,  1706 => 1290,  1704 => 1288,  1695 => 1282,  1690 => 1279,  1688 => 1277,  1641 => 1233,  1636 => 1231,  1631 => 1229,  1626 => 1227,  1600 => 1204,  1573 => 1184,  1528 => 1142,  1487 => 1104,  1482 => 1102,  1477 => 1100,  1472 => 1098,  1420 => 1049,  1415 => 1047,  1410 => 1045,  1405 => 1043,  1385 => 1026,  1381 => 1025,  1374 => 1021,  1366 => 1016,  1358 => 1011,  1350 => 1006,  1346 => 1005,  1339 => 1001,  1335 => 1000,  1328 => 996,  1320 => 991,  1312 => 986,  1304 => 981,  1286 => 965,  1284 => 963,  1281 => 962,  1279 => 960,  1276 => 959,  1274 => 957,  1271 => 956,  1269 => 954,  1266 => 953,  1264 => 951,  1261 => 950,  1259 => 948,  1256 => 947,  1254 => 945,  1251 => 944,  1249 => 942,  1246 => 941,  1244 => 939,  1241 => 938,  1239 => 936,  1234 => 933,  1232 => 931,  1229 => 930,  1227 => 928,  1224 => 927,  1222 => 925,  1219 => 924,  1217 => 922,  1214 => 921,  1212 => 919,  1209 => 918,  1207 => 916,  1204 => 915,  1202 => 913,  1199 => 912,  1197 => 910,  1194 => 909,  1192 => 907,  1189 => 906,  1187 => 904,  1182 => 901,  1180 => 899,  1177 => 898,  1175 => 896,  1172 => 895,  1170 => 893,  1167 => 892,  1165 => 890,  1162 => 889,  1160 => 887,  1157 => 886,  1155 => 884,  1152 => 883,  1150 => 881,  1147 => 880,  1145 => 878,  1142 => 877,  1140 => 875,  1137 => 874,  1135 => 872,  1130 => 869,  1128 => 867,  1125 => 866,  1123 => 864,  1120 => 863,  1118 => 861,  1115 => 860,  1113 => 858,  1110 => 857,  1108 => 855,  1105 => 854,  1103 => 852,  1100 => 851,  1098 => 849,  1095 => 848,  1093 => 846,  1090 => 845,  1088 => 843,  1085 => 842,  1083 => 840,  1078 => 837,  1076 => 835,  1073 => 834,  1071 => 832,  1068 => 831,  1066 => 829,  1063 => 828,  1061 => 826,  1058 => 825,  1056 => 823,  1053 => 822,  1051 => 820,  1048 => 819,  1046 => 817,  1043 => 816,  1041 => 814,  1038 => 813,  1036 => 811,  1033 => 810,  1031 => 808,  1026 => 805,  1024 => 803,  1021 => 802,  1019 => 800,  1016 => 799,  1014 => 797,  1011 => 796,  1009 => 794,  1006 => 793,  1004 => 791,  1001 => 790,  999 => 788,  996 => 787,  994 => 785,  991 => 784,  989 => 782,  986 => 781,  984 => 779,  981 => 778,  979 => 776,  974 => 773,  972 => 771,  969 => 770,  967 => 768,  964 => 767,  962 => 765,  959 => 764,  957 => 762,  954 => 761,  952 => 759,  949 => 758,  947 => 756,  944 => 755,  942 => 753,  939 => 752,  937 => 750,  934 => 749,  932 => 747,  929 => 746,  927 => 744,  922 => 741,  920 => 739,  917 => 738,  915 => 736,  912 => 735,  910 => 733,  907 => 732,  905 => 730,  902 => 729,  900 => 727,  897 => 726,  895 => 724,  892 => 723,  890 => 721,  887 => 720,  885 => 718,  882 => 717,  880 => 715,  877 => 714,  875 => 712,  870 => 709,  868 => 707,  865 => 706,  863 => 704,  860 => 703,  858 => 701,  855 => 700,  853 => 698,  850 => 697,  848 => 695,  845 => 694,  843 => 692,  840 => 691,  838 => 689,  835 => 688,  833 => 686,  830 => 685,  828 => 683,  825 => 682,  823 => 680,  818 => 677,  816 => 675,  813 => 674,  811 => 672,  808 => 671,  806 => 669,  803 => 668,  801 => 666,  798 => 665,  796 => 663,  793 => 662,  791 => 660,  788 => 659,  786 => 657,  783 => 656,  781 => 654,  778 => 653,  776 => 651,  773 => 650,  771 => 648,  516 => 396,  512 => 394,  509 => 388,  506 => 387,  501 => 384,  498 => 382,  495 => 381,  490 => 378,  488 => 352,  486 => 343,  483 => 340,  480 => 339,  470 => 332,  464 => 329,  451 => 319,  436 => 307,  427 => 301,  421 => 298,  415 => 295,  407 => 290,  403 => 289,  399 => 288,  395 => 287,  390 => 285,  380 => 278,  375 => 276,  344 => 248,  341 => 247,  338 => 246,  333 => 243,  331 => 240,  328 => 239,  326 => 236,  323 => 235,  321 => 232,  318 => 231,  316 => 228,  313 => 227,  311 => 224,  308 => 223,  306 => 220,  303 => 219,  301 => 216,  298 => 215,  296 => 212,  293 => 211,  291 => 208,  288 => 207,  286 => 204,  283 => 203,  281 => 200,  278 => 199,  276 => 196,  273 => 195,  271 => 192,  268 => 191,  266 => 188,  263 => 187,  261 => 184,  258 => 183,  256 => 180,  253 => 179,  251 => 176,  248 => 175,  246 => 172,  243 => 171,  241 => 168,  238 => 167,  236 => 164,  233 => 163,  231 => 160,  228 => 159,  226 => 156,  223 => 155,  221 => 152,  218 => 151,  216 => 148,  213 => 147,  211 => 144,  208 => 143,  206 => 140,  203 => 139,  201 => 136,  198 => 135,  196 => 132,  193 => 131,  191 => 128,  188 => 127,  186 => 124,  183 => 123,  181 => 120,  178 => 119,  176 => 116,  173 => 115,  171 => 112,  168 => 111,  166 => 108,  163 => 107,  161 => 104,  158 => 103,  156 => 100,  153 => 99,  151 => 96,  148 => 95,  146 => 92,  143 => 91,  141 => 88,  138 => 87,  136 => 84,  133 => 83,  131 => 80,  128 => 79,  126 => 76,  123 => 75,  121 => 72,  118 => 71,  116 => 68,  113 => 67,  111 => 64,  108 => 63,  106 => 60,  103 => 59,  101 => 56,  98 => 55,  96 => 52,  93 => 51,  91 => 48,  88 => 47,  86 => 44,  83 => 43,  81 => 40,  78 => 39,  76 => 36,  73 => 35,  71 => 32,  68 => 31,  66 => 28,  63 => 27,  61 => 24,  58 => 23,  56 => 20,  53 => 19,  51 => 16,  48 => 15,  46 => 12,  43 => 11,  41 => 8,  38 => 7,  35 => 4,  32 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "newsletter/editor.html", "/app/public/wp-content/plugins/mailpoet/views/newsletter/editor.html");
    }
}
