<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* classroom/list.html.twig */
class __TwigTemplate_56b020b7be3287abefee7dc7b8e206a3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "classroom/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "classroom/list.html.twig"));

        // line 1
        yield "<h1>Classrooms List</h1>
<table border=\"3\">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["classrooms"]) || array_key_exists("classrooms", $context) ? $context["classrooms"] : (function () { throw new RuntimeError('Variable "classrooms" does not exist.', 11, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["classroom"]) {
            // line 12
            yield "            <tr>
                <td>";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["classroom"], "id", [], "any", false, false, false, 13), "html", null, true);
            yield "</td>
                <td>";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["classroom"], "name", [], "any", false, false, false, 14), "html", null, true);
            yield "</td>
                <td>
                    <a href=\"";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update_classroom", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["classroom"], "id", [], "any", false, false, false, 16)]), "html", null, true);
            yield "\">Edit</a>
                    <a href=\"";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_classroom", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["classroom"], "id", [], "any", false, false, false, 17)]), "html", null, true);
            yield "\">Delete</a>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['classroom'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        yield "    </tbody>
</table>    ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "classroom/list.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  89 => 20,  80 => 17,  76 => 16,  71 => 14,  67 => 13,  64 => 12,  60 => 11,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<h1>Classrooms List</h1>
<table border=\"3\">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for classroom in classrooms %}
            <tr>
                <td>{{ classroom.id }}</td>
                <td>{{ classroom.name }}</td>
                <td>
                    <a href=\"{{ path('update_classroom', {'id': classroom.id}) }}\">Edit</a>
                    <a href=\"{{ path('delete_classroom', {'id': classroom.id}) }}\">Delete</a>
            </tr>
        {% endfor %}
    </tbody>
</table>    ", "classroom/list.html.twig", "C:\\Users\\user\\revenge\\templates\\classroom\\list.html.twig");
    }
}
