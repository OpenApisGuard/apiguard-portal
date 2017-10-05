<?php

/* modules/webform/templates/webform-composite-contact.html.twig */
class __TwigTemplate_0d5bd289ba78bc4b8180afa85ad84b9d89a281042dfed2958ef1717663b3a8ce extends Twig_Template
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
            if (($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "name", array()) || $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "company", array()))) {
                // line 20
                echo "    <div class=\"webform-flexbox\">
      ";
                // line 21
                if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "name", array())) {
                    // line 22
                    echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "name", array()), "html", null, true));
                    echo "</div></div>
      ";
                }
                // line 24
                echo "      ";
                if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "company", array())) {
                    // line 25
                    echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "company", array()), "html", null, true));
                    echo "</div></div>
      ";
                }
                // line 27
                echo "    </div>
  ";
            }
            // line 29
            echo "
  ";
            // line 30
            if (($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "email", array()) || $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "phone", array()))) {
                // line 31
                echo "    <div class=\"webform-flexbox\">
      ";
                // line 32
                if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "email", array())) {
                    // line 33
                    echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "email", array()), "html", null, true));
                    echo "</div></div>
      ";
                }
                // line 35
                echo "      ";
                if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "phone", array())) {
                    // line 36
                    echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "phone", array()), "html", null, true));
                    echo "</div></div>
      ";
                }
                // line 38
                echo "    </div>
  ";
            }
            // line 40
            echo "
  ";
            // line 41
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address", array())) {
                // line 42
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 43
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 46
            echo "
  ";
            // line 47
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address_2", array())) {
                // line 48
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 49
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "address_2", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 52
            echo "
  <div class=\"webform-flexbox\">
    ";
            // line 54
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "city", array())) {
                // line 55
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "city", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 57
            echo "    ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "state_province", array())) {
                // line 58
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "state_province", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 60
            echo "    ";
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "postal_code", array())) {
                // line 61
                echo "      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "postal_code", array()), "html", null, true));
                echo "</div></div>
    ";
            }
            // line 63
            echo "  </div>

  ";
            // line 65
            if ($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "country", array())) {
                // line 66
                echo "    <div class=\"webform-flexbox\">
      <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                // line 67
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "country", array()), "html", null, true));
                echo "</div></div>
    </div>
  ";
            }
            // line 70
            echo "
";
        } else {
            // line 72
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-composite-contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 72,  180 => 70,  174 => 67,  171 => 66,  169 => 65,  165 => 63,  159 => 61,  156 => 60,  150 => 58,  147 => 57,  141 => 55,  139 => 54,  135 => 52,  129 => 49,  126 => 48,  124 => 47,  121 => 46,  115 => 43,  112 => 42,  110 => 41,  107 => 40,  103 => 38,  97 => 36,  94 => 35,  88 => 33,  86 => 32,  83 => 31,  81 => 30,  78 => 29,  74 => 27,  68 => 25,  65 => 24,  59 => 22,  57 => 21,  54 => 20,  52 => 19,  49 => 18,  47 => 17,  43 => 16,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation of a contact composite webform element.
 *
 * Available variables:
 * - content: The contact webform element to be output.
 * - flexbox: Determines if Flexbox layout should be applied to the composite
 *   element.
 *
 * @see template_preprocess_webform_composite_contact()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform/webform.element.composite') }}
{% if flexbox %}

  {% if content.name or content.company %}
    <div class=\"webform-flexbox\">
      {% if content.name %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.name }}</div></div>
      {% endif %}
      {% if content.company %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.company }}</div></div>
      {% endif %}
    </div>
  {% endif %}

  {% if content.email or content.phone %}
    <div class=\"webform-flexbox\">
      {% if content.email %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.email }}</div></div>
      {% endif %}
      {% if content.phone %}
        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">{{ content.phone }}</div></div>
      {% endif %}
    </div>
  {% endif %}

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
