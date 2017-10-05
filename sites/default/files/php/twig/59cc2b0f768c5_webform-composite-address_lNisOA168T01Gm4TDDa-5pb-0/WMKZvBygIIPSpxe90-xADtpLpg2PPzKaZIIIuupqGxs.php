<?php

/* modules/webform/templates/webform-composite-address.html.twig */
class __TwigTemplate_73a54beeb1203e3b9bc2402651e5f8c8e9423163d75ca42f0e88a711e1b639e7 extends Twig_Template
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
        $tags = array("if" => 17);
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
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("webform/webform.element.composite"), "html", null, true));
        echo "
";
        // line 17
        if ((isset($context["flexbox"]) ? $context["flexbox"] : null)) {
            // line 18
            echo "
  ";
            // line 19
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address", array())) {
                // line 20
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 21
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 24
            echo "
  ";
            // line 25
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address_2", array())) {
                // line 26
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 27
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address_2", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 30
            echo "
  <div class=\"webform-flexbox\">
    ";
            // line 32
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "city", array())) {
                // line 33
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "city", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 35
            echo "    ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "state_province", array())) {
                // line 36
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "state_province", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 38
            echo "    ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "postal_code", array())) {
                // line 39
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "postal_code", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 41
            echo "  </div>

  ";
            // line 43
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "country", array())) {
                // line 44
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 45
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "country", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 48
            echo "
";
        } else {
            // line 50
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-composite-address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 50,  122 => 48,  116 => 45,  113 => 44,  111 => 43,  107 => 41,  101 => 39,  98 => 38,  92 => 36,  89 => 35,  83 => 33,  81 => 32,  77 => 30,  71 => 27,  68 => 26,  66 => 25,  63 => 24,  57 => 21,  54 => 20,  52 => 19,  49 => 18,  47 => 17,  43 => 16,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation of an address composite webform element.
 *
 * Available variables:
 * - content: The address webform element to be output.
 * - flexbox: Determines if Flexbox layout should be applied to the composite
 *   element.
 *
 * @see template_preprocess_webform_composite_address()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform/webform.element.composite') }}
{% if flexbox %}

  {% if content.address %}
    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.address }}</div></div>
    </div>
  {% endif %}

  {% if content.address_2 %}
    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.address_2 }}</div></div>
    </div>
  {% endif %}

  <div class=\"webform-flexbox\">
    {% if content.city %}
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.city }}</div></div>
    {% endif %}
    {% if content.state_province %}
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.state_province }}</div></div>
    {% endif %}
    {% if content.postal_code %}
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.postal_code }}</div></div>
    {% endif %}
  </div>

  {% if content.country %}
    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.country }}</div></div>
    </div>
  {% endif %}

{% else %}
  {{ content }}
{% endif %}
";
    }
}
