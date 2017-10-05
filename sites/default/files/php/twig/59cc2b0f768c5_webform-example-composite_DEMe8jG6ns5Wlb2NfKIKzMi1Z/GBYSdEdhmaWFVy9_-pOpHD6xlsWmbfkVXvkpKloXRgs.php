<?php

/* modules/webform/modules/webform_example_composite/templates/webform-example-composite.html.twig */
class __TwigTemplate_7af4f308375e29ccd59be6ec183c35734f3cfecda29914038d321a1f67ae2e91 extends Twig_Template
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
        $tags = array("if" => 15);
        $filters = array();
        $functions = array("attach_library" => 14);

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

        // line 14
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("webform_example_composite/webform_example_composite"), "html", null, true));
        echo "
";
        // line 15
        if ((isset($context["flexbox"]) ? $context["flexbox"] : null)) {
            // line 16
            echo "
    <div class=\"webform-flexbox\">
      ";
            // line 18
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "first_name", array())) {
                // line 19
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "first_name", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 21
            echo "      ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "last_name", array())) {
                // line 22
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "last_name", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 24
            echo "      ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "date_of_birth", array())) {
                // line 25
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "date_of_birth", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 27
            echo "      ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "gender", array())) {
                // line 28
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "gender", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 30
            echo "    </div>

";
        } else {
            // line 33
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
            echo "
";
        }
        // line 35
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/webform/modules/webform_example_composite/templates/webform-example-composite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 35,  93 => 33,  88 => 30,  82 => 28,  79 => 27,  73 => 25,  70 => 24,  64 => 22,  61 => 21,  55 => 19,  53 => 18,  49 => 16,  47 => 15,  43 => 14,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation of a webform example composite.
 *
 * Available variables:
 * - content: The webform example composite to be output.

 * @see template_preprocess_webform_example_composite()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform_example_composite/webform_example_composite') }}
{% if flexbox %}

    <div class=\"webform-flexbox\">
      {% if content.first_name %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.first_name }}</div></div>
      {% endif %}
      {% if content.last_name %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.last_name }}</div></div>
      {% endif %}
      {% if content.date_of_birth %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.date_of_birth }}</div></div>
      {% endif %}
      {% if content.gender %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.gender }}</div></div>
      {% endif %}
    </div>

{% else %}
  {{ content }}
{% endif %}

";
    }
}
