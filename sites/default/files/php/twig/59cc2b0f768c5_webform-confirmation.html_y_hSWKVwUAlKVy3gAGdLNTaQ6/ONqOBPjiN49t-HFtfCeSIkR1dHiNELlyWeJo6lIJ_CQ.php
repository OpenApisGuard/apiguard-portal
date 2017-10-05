<?php

/* modules/webform/templates/webform-confirmation.html.twig */
class __TwigTemplate_bf995ae78b9005e54241596cf8265c0dac73f66454ef408ae6a93d86f7677312 extends Twig_Template
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
        $tags = array("if" => 18);
        $filters = array();
        $functions = array("attach_library" => 16);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
                array('attach_library')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 16
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("webform/webform.confirmation"), "html", null, true));
        echo "

";
        // line 18
        if ((isset($context["progress"]) ? $context["progress"] : null)) {
            // line 19
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["progress"]) ? $context["progress"] : null), "html", null, true));
            echo "
";
        }
        // line 21
        echo "
<div";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "webform-confirmation"), "method"), "html", null, true));
        echo ">

  ";
        // line 24
        if ((isset($context["message"]) ? $context["message"] : null)) {
            // line 25
            echo "    <div class=\"webform-confirmation__message\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true));
            echo "</div>
  ";
        }
        // line 27
        echo "
  ";
        // line 28
        if ((isset($context["back"]) ? $context["back"] : null)) {
            // line 29
            echo "  <div class=\"webform-confirmation__back\">
    <a href=\"";
            // line 30
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["back_url"]) ? $context["back_url"] : null), "html", null, true));
            echo "\" rel=\"back\" title=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["back_label"]) ? $context["back_label"] : null), "html", null, true));
            echo "\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["back_attributes"]) ? $context["back_attributes"] : null), "html", null, true));
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["back_label"]) ? $context["back_label"] : null), "html", null, true));
            echo "</a>
  </div>
  ";
        }
        // line 33
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 33,  80 => 30,  77 => 29,  75 => 28,  72 => 27,  66 => 25,  64 => 24,  59 => 22,  56 => 21,  50 => 19,  48 => 18,  43 => 16,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation to webform confirmation.
 *
 * Available variables:
 * - progress: Progress bar.
 * - message: Confirmation message.
 * - back_url: URL to the previous webform submission.
 *
 * @see template_preprocess_webform_confirmation()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform/webform.confirmation') }}

{% if progress %}
  {{ progress }}
{% endif %}

<div{{ attributes.addClass('webform-confirmation') }}>

  {% if message %}
    <div class=\"webform-confirmation__message\">{{ message }}</div>
  {% endif %}

  {% if back %}
  <div class=\"webform-confirmation__back\">
    <a href=\"{{ back_url }}\" rel=\"back\" title=\"{{ back_label }}\"{{ back_attributes }}>{{ back_label }}</a>
  </div>
  {% endif %}

</div>
";
    }
}
