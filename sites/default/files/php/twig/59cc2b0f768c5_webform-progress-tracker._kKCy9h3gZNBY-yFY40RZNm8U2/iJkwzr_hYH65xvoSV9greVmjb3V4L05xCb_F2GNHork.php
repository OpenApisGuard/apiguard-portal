<?php

/* modules/webform/templates/webform-progress-tracker.html.twig */
class __TwigTemplate_8813d147b2e6e5d0cbc09da835c1fdc5cf536e9f69b0e254a052d52ac4feec41 extends Twig_Template
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
        $tags = array("for" => 22, "set" => 24, "if" => 32);
        $filters = array("length" => 32);
        $functions = array("attach_library" => 19);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for', 'set', 'if'),
                array('length'),
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

        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("webform/webform.progress.tracker"), "html", null, true));
        echo "

<ul class=\"webform-progress-tracker progress-tracker progress-tracker--center\">
  ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["progress"]) ? $context["progress"] : null));
        foreach ($context['_seq'] as $context["index"] => $context["title"]) {
            // line 23
            echo "  ";
            // line 24
            $context["classes"] = array(0 => "progress-step", 1 => (((            // line 26
$context["index"] < (isset($context["current_index"]) ? $context["current_index"] : null))) ? ("is-complete") : ("")), 2 => (((            // line 27
$context["index"] == (isset($context["current_index"]) ? $context["current_index"] : null))) ? ("is-active") : ("")));
            // line 30
            echo "  <li";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "setAttribute", array(0 => "class", 1 => ""), "method"), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
            echo ">
    <span class=\"progress-marker\">";
            // line 31
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, ($context["index"] + 1), "html", null, true));
            echo "</span>
    ";
            // line 32
            if ((twig_length_filter($this->env, (isset($context["progress"]) ? $context["progress"] : null)) < (isset($context["max_pages"]) ? $context["max_pages"] : null))) {
                // line 33
                echo "      <span class=\"progress-text\">
        <div class=\"progress-title\">";
                // line 34
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["title"], "html", null, true));
                echo "</div>
      </span>
    ";
            }
            // line 37
            echo "  </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-progress-tracker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 39,  79 => 37,  73 => 34,  70 => 33,  68 => 32,  64 => 31,  59 => 30,  57 => 27,  56 => 26,  55 => 24,  53 => 23,  49 => 22,  43 => 19,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation for webform wizard progress tracker.
 *
 * Available variables:
 * - webform: A webform.
 * - pages: Associatve array of wizard pages.
 * - progress: Array of wizard progress containing page titles.
 * - current_page: Current wizard page key.
 * - current_index: The current wizard page index.
 * - max_pages: Maximum number of pages that progress text should be displayed on.
 *
 * @see template_preprocess_webform_progress_bar()
 *
 * @ingroup themeable
 */
#}
{{ attach_library('webform/webform.progress.tracker') }}

<ul class=\"webform-progress-tracker progress-tracker progress-tracker--center\">
  {% for index, title in progress %}
  {%
    set classes = [
      'progress-step',
      index < current_index ? 'is-complete',
      index == current_index ? 'is-active',
    ]
  %}
  <li{{ attributes.setAttribute('class', '').addClass(classes) }}>
    <span class=\"progress-marker\">{{ index + 1 }}</span>
    {% if progress|length < max_pages %}
      <span class=\"progress-text\">
        <div class=\"progress-title\">{{ title }}</div>
      </span>
    {% endif %}
  </li>
  {% endfor %}
</ul>
";
    }
}
