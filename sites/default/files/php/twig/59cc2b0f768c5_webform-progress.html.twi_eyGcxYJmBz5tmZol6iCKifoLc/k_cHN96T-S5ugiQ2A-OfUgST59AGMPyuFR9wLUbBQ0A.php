<?php

/* modules/webform/templates/webform-progress.html.twig */
class __TwigTemplate_425a0a704e68aa3a7689db620427bb88ab926250c3d10e1d6dd6e9db7fc14e54 extends Twig_Template
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
        $tags = array("if" => 26);
        $filters = array();
        $functions = array("attach_library" => 20);

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

        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("webform/webform.progress"), "html", null, true));
        echo "

<div class=\"webform-progress\">

  ";
        // line 24
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["bar"]) ? $context["bar"] : null), "html", null, true));
        echo "

  ";
        // line 26
        if (((isset($context["summary"]) ? $context["summary"] : null) || (isset($context["percentage"]) ? $context["percentage"] : null))) {
            // line 27
            echo "    <div class=\"webform-progress__status\">
      ";
            // line 28
            if ((isset($context["summary"]) ? $context["summary"] : null)) {
                // line 29
                echo "        <span class=\"webform-progress__summary\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["summary"]) ? $context["summary"] : null), "html", null, true));
                echo "</span>
        ";
                // line 30
                if ((isset($context["percentage"]) ? $context["percentage"] : null)) {
                    // line 31
                    echo "          <span class=\"webform-progress__percentage\">(";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["percentage"]) ? $context["percentage"] : null), "html", null, true));
                    echo ")</span>
        ";
                }
                // line 33
                echo "      ";
            } else {
                // line 34
                echo "        <span class=\"webform-progress__percentage\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["percentage"]) ? $context["percentage"] : null), "html", null, true));
                echo "</span>
      ";
            }
            // line 36
            echo "    </div>
  ";
        }
        // line 38
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-progress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 38,  84 => 36,  78 => 34,  75 => 33,  69 => 31,  67 => 30,  62 => 29,  60 => 28,  57 => 27,  55 => 26,  50 => 24,  43 => 20,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation for webform wizard progress.
 *
 * Available variables:
 * - webform: A webform.
 * - pages: Array of wizard pages.
 * - current_page: Current wizard page.
 * - total_pages: Current wizard page.
 * - summary: Summary of progress.
 * - percentage: Percentage completed.
 * - bar: A progress bar.
 *
 * @see template_preprocess_webform_progress()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform/webform.progress') }}

<div class=\"webform-progress\">

  {{ bar }}

  {% if summary or percentage %}
    <div class=\"webform-progress__status\">
      {% if summary %}
        <span class=\"webform-progress__summary\">{{ summary }}</span>
        {% if percentage %}
          <span class=\"webform-progress__percentage\">({{ percentage }})</span>
        {% endif %}
      {% else %}
        <span class=\"webform-progress__percentage\">{{ percentage }}</span>
      {% endif %}
    </div>
  {% endif %}

</div>
";
    }
}
