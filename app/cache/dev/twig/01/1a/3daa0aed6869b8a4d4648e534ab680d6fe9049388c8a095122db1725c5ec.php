<?php

/* ::base.html.twig */
class __TwigTemplate_011a3daa0aed6869b8a4d4648e534ab680d6fe9049388c8a095122db1725c5ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "
         ";
        // line 23
        $this->displayBlock('javascripts', $context, $blocks);
        // line 29
        echo "        
    </head>
    <body >
             <div class=\"container-fluid\" style=\"background-color:#FDFDFD\" >


             ";
        // line 35
        $this->displayBlock('header', $context, $blocks);
        // line 59
        echo "
             ";
        // line 60
        $this->displayBlock('content', $context, $blocks);
        // line 63
        echo "
             ";
        // line 64
        $this->displayBlock('footer', $context, $blocks);
        // line 90
        echo "        
        
        
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "XarrMatt";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "              
            <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            
             <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />

             <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        
             <style type=\"text/css\">
               .header a{color:black}
                a i.fa-facebook {color:#3b5998}
                a i.fa-twitter {color:#55ACEE}
                a i.fa-google-plus  {color :#DD4B39}
                
              </style>
        ";
    }

    // line 23
    public function block_javascripts($context, array $blocks = array())
    {
        // line 24
        echo "          <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/jquery.js"), "html", null, true);
        echo "\" ></script>
          <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>


         ";
    }

    // line 35
    public function block_header($context, array $blocks = array())
    {
        // line 36
        echo "                 <div class=\"header\">
                        <div class=\"row \">
                            <div class=\"col-sm-1\">
                                <!--img src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("Resources/img/logo.jpg"), "html", null, true);
        echo "\"--> 
                            </div> 
                                               
                             ";
        // line 42
        if ($this->getAttribute((isset($context["session"]) ? $context["session"] : null), "login", array(), "any", true, true)) {
            // line 43
            echo "                                     ";
            $this->env->loadTemplate("menu_membre.html.twig")->display($context);
            // line 44
            echo "                                ";
        } else {
            echo "   
                                     ";
            // line 45
            $this->env->loadTemplate("menu_internaute.html.twig")->display($context);
            echo " 

                             ";
        }
        // line 48
        echo "
                              <div class=\"col-sm-2 \">
                                 <a href=\"#\"><i class=\"fa fa-facebook fa-2x\"></i></a>
                                 <a href=\"#\"><i class=\"fa fa-twitter fa-2x\"></i></a>
                                 <a href=\"#\"><i class=\"fa fa-google-plus fa-2x\"></i></a>
                            </div>

                        </div>
                  </div>

             ";
    }

    // line 60
    public function block_content($context, array $blocks = array())
    {
        // line 61
        echo "
             ";
    }

    // line 64
    public function block_footer($context, array $blocks = array())
    {
        // line 65
        echo "                  <div class=\"footer\" >
                    
                    <div class=\"row\">

                       <div class=\"col-sm-3\">
                         <span >XarrMatt</span>  
                       </div>

                        <div class=\"col-sm-3\">
                           <span>A Propos</span> 
                       </div>
                        <div class=\"col-sm-3\">
                            <span>Réseaux Sociaux</span>
                       </div>
                        <div class=\"col-sm-3\">
                           jjijjjj
                       </div>
                        
                       
                    </div>

                 </div>
               
              
             ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  178 => 65,  175 => 64,  170 => 61,  167 => 60,  153 => 48,  147 => 45,  142 => 44,  139 => 43,  137 => 42,  131 => 39,  126 => 36,  123 => 35,  115 => 25,  110 => 24,  107 => 23,  93 => 12,  88 => 10,  83 => 8,  80 => 7,  77 => 6,  71 => 5,  62 => 90,  60 => 64,  57 => 63,  55 => 60,  52 => 59,  50 => 35,  42 => 29,  40 => 23,  37 => 22,  35 => 6,  31 => 5,  25 => 1,);
    }
}
