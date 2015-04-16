<?php

/* XmUserBundle:User:new.html.twig */
class __TwigTemplate_52786196fbea1096a93202941a42a421fceb965ec7c7fb14c2107ce64c9baf8a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Inscription";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        echo " 
\t \t";
        // line 6
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "  
\t\t
\t\t<link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/bootstrap-datepicker3.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t 
\t ";
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        // line 13
        echo "         ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

 
              <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/bootstrap-datepicker.min.js"), "html", null, true);
        echo "\"></script>
              <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/bootstrap-datepicker.fr.min.js"), "html", null, true);
        echo "\"></script>
               <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/Modernizr.js"), "html", null, true);
        echo "\"></script>
               <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/Bootstrap-growl/jquery.bootstrap-growl.js"), "html", null, true);
        echo "\"></script>

              <script type=\"text/javascript\">
\t\t           \$(document).ready(function  () {
\t\t             
\t\t             if(Modernizr.inputtypes.date==false)
\t\t             \t
\t\t             \t {
\t\t             \t     \$('.datepicker').datepicker({
\t\t   \t\t\t\t     startDate : '-21915d',
\t\t   \t\t\t\t     endDate   : '-6574d',
\t\t   \t\t\t\t     language : 'fr',
\t\t   \t\t\t\t     todayHighlight :true,
\t\t   \t\t\t\t     weekStart : 1 
\t\t\t\t                                 })
                         }\t           \t
\t\t                
\t\t           });       
          
          </script>\t
\t ";
    }

    // line 41
    public function block_content($context, array $blocks = array())
    {
        // line 42
        echo "\t  <div class=\"col-sm-offset-1\">
\t    <h1 >Inscription</h1>

\t        ";
        // line 45
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
\t  </div>
\t ";
    }

    public function getTemplateName()
    {
        return "XmUserBundle:User:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 45,  112 => 42,  109 => 41,  84 => 19,  80 => 18,  76 => 17,  72 => 16,  65 => 13,  62 => 12,  55 => 8,  50 => 6,  45 => 5,  39 => 3,  11 => 1,);
    }
}
