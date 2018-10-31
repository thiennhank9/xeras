<?php

/* modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-builder.html.twig */
class __TwigTemplate_00fd4cf371c3acc4a2548cfb3765648dd2e81c870fe4b60d6226bf84529a43a1 extends Twig_Template
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
        $tags = array("for" => 7, "if" => 9, "set" => 10);
        $filters = array("merge" => 40, "join" => 42, "t" => 69, "raw" => 87);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for', 'if', 'set'),
                array('merge', 'join', 't', 'raw'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div id=\"nd_layout_builder\">

    <div class=\"row paddings-fix\">
        <div class=\"col-md-12 layouts-list\">
      
    \t    <span class=\"layouts-links\">
          ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["layout_id"] => $context["layout"]) {
            // line 8
            echo "
              ";
            // line 9
            if (($context["layout_id"] == "layout-default")) {
                // line 10
                echo "                  ";
                $context["layout_class"] = "active";
                // line 11
                echo "              ";
            } else {
                // line 12
                echo "                  ";
                $context["layout_class"] = "";
                // line 13
                echo "              ";
            }
            // line 14
            echo "
              <a href=\"#";
            // line 15
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["layout_id"], "html", null, true));
            echo "\" class=\"btn btn-sm btn-default ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["layout_class"] ?? null), "html", null, true));
            echo "\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["layout"], "name", array()), "html", null, true));
            echo "</a>

          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['layout_id'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "          </span>


            <a href=\"#\" id=\"nd_layout\" class=\"btn btn-primary btn-xs\">Clone Layout</a>
            <i class=\"fa fa-cog fa-2x\" id=\"layout-settings\"></i>
        </div>
    </div>

    <div class=\"layouts\">
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["layout_id"] => $context["layout"]) {
            // line 28
            echo "
            ";
            // line 29
            if (($context["layout_id"] == "layout-default")) {
                // line 30
                echo "                ";
                $context["layout_class"] = "active";
                // line 31
                echo "            ";
            } else {
                // line 32
                echo "                ";
                $context["layout_class"] = "";
                // line 33
                echo "            ";
            }
            // line 34
            echo "
            <ol id=\"";
            // line 35
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["layout_id"], "html", null, true));
            echo "\" class=\"layout ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["layout_class"] ?? null), "html", null, true));
            echo "\">


                ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["layout"], "rows", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 39
                echo "
                    ";
                // line 40
                $context["rowattr"] = twig_array_merge($this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "class", array()), array(0 => "sortable"));
                // line 41
                echo "
                    <li id=\"";
                // line 42
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "id", array()), "html", null, true));
                echo "\" class=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter(($context["rowattr"] ?? null), " "), "html", null, true));
                echo "\">
                        <h2 title=\"";
                // line 43
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["row"], "name", array()), "html", null, true));
                echo "\"><i class=\"fa fa-arrows\"></i><span>";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["row"], "name", array()), "html", null, true));
                echo "</span><i
                                    class=\"fa fa-cog settings-row\"></i></h2>
                        <ol class=\"sortable-parent\">
                            ";
                // line 46
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["layout"], "regions", array()));
                foreach ($context['_seq'] as $context["region_key"] => $context["region"]) {
                    // line 47
                    echo "                                ";
                    if (($this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "id", array()) == $this->getAttribute($context["region"], "row_id", array()))) {
                        // line 48
                        echo "                                    ";
                        $context["attr"] = twig_array_merge($this->getAttribute($this->getAttribute($context["region"], "attributes", array()), "class", array()), array(0 => "col", 1 => "sortable"));
                        // line 49
                        echo "                                    ";
                        // line 50
                        echo "                                    <li id=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["region"], "attributes", array()), "id", array()), "html", null, true));
                        echo "\" class=\"";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter(($context["attr"] ?? null), " "), "html", null, true));
                        echo "\">
                                    <h3><i class=\"fa fa-arrows\"></i><span>";
                        // line 51
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["region"], "name", array()), "html", null, true));
                        echo "</span><i
                                                class=\"fa fa-cog settings-col\"></i></h3>
                                    </li>
                                ";
                    }
                    // line 55
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['region_key'], $context['region'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                        </ol>
                    </li>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "
            </ol>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['layout_id'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    </div>


</div>

<div id=\"nd_layout_bottom\">
    <button id=\"nd_row\" class=\"btn btn-primary add-element-action\">";
        // line 69
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Add Row")));
        echo "</button>
</div>

<!-- Layout Add form -->
<div id=\"layout-add\" title=\"Add new Layout\">
 ";
        // line 74
        $context["layout_form"] = "
  <div class=\"form-group\">
    <input type=\"text\" class=\"form-control name\" placeholder=\"Name\">
</div>
<div class=\"form-group\">
    <label for=\"layout_pages\">Show on specific pages:</label>
    <textarea class=\"form-control layout-visible\" name=\"layout_pages\" rows=\"5\" placeholder=\"Pages\"></textarea>
    <div>Specify pages by using their paths. Enter one path per line. The \"*\" character is a wildcard. Example paths are
        blog for the blog page and blog/* for every personal blog. &lt;front&gt; is the front page.
    </div>
</div>";
        // line 87
        echo "  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["layout_form"] ?? null)));
        echo "
</div>

<!-- Layout Edit form -->
<div id = \"layout-settings-form\" title = \"Layout settings\">
    ";
        // line 92
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["layout_form"] ?? null)));
        echo "
</div>

<!-- Row Add form -->
<div id = \"row-add\" title = \"Add new Row\">
";
        // line 97
        $context["row_form"] = "
  <input type=\"text\" class=\"form-control name\" placeholder=\"Name\">
    <div class=\"settings-tabs\">
        <a href=\"#tag_class_row_tab\" class=\"btn btn-info btn-md\">Tag &amp; Class</a>
        <a href=\"#paddings_row_tab\" class=\"btn btn-info btn-md\">Paddings</a>
        <a href=\"#dropdown_menu_lins_tab\" class=\"btn btn-info btn-md one-page-option\">DropDown Menu Links</a>
    </div>

    <div id = \"tag_class_row_tab\" class = \"settings-tab-form\">
        <div class = \"row\">
            <div class = \"col-md-6 form-group\">
                <label for=\"layout_pages\">Extra Classes</label>
                <input type = \"text\" class = \"form-control input-setting\" name = \"class\" placeholder = \"Class\">
            </div>
            <div class = \"col-md-6\">
                <label for=\"layout_pages\">Tag Type</label>
                <select class = \"form-control input-setting\" name = \"tag\">
                    <option value=\"div\">div</option>
                    <option value=\"section\">section</option>
                    <option value=\"aside\">aside</option>
                    <option value=\"footer\">footer</option>
                    <option value=\"none\">none</option>
                </select>
            </div>
        </div>
        <div class = \"row\">
            <div class = \"col-xs-6 form-group checkbox\">
                <input type=\"checkbox\" class=\"input-setting\" name=\"full_width\"> <label for=\"full_width\">Full Width</label>
            </div>
            <div class = \"col-xs-6 form-group checkbox\">
                <input type=\"checkbox\" class=\"input-setting\" name=\"use_default\"> <label for=\"use_default\" title = \"In Default Layout will be searched row with the same name and used instead of the current one.\">Use row from <i>Default</i> Layout</label>
            </div>
        </div>
    </div>

    <div id = \"dropdown_menu_lins_tab\" class = \"settings-tab-form\">
        <div class = \"row\">
            <div class = \"col-md-6 form-group checkbox\">
                <input type=\"checkbox\" class =\"input-setting\" name = \"dropdown_links\"> <label for=\"dropdown_links\">Dropdown Menu Links</label>
            </div>
            <div class = \"col-md-6 form-group checkbox\">
                <input type=\"checkbox\" class =\"input-setting\" name = \"hide_menu\"> <label for=\"hide_menu\">Hide title from Menu</label>
            </div>
            <div class = \"col-md-12\">
                <p class = \"available_id\">Sections anchors: <span></span></p>
            </div>
        </div>

        <div class = \"dropdown-menu-links-wrap\">
            <div class = \"row\">
                <div class = \"col-md-6 form-group\">
                    Dropdown Menu link
                </div>
                <div class = \"col-md-6 form-group\">
                    URL
                </div>
            </div>
            <div class = \"dropdown_menu\">
                <div class = \"row\">
                    <div class = \"col-md-6 form-group\">
                        <input type = \"text\" class = \"form-control input-setting menu_link\" name = \"menu_link_1\" placeholder = \"Menu title\">
                    </div>
                    <div class = \"col-md-6 form-group\">
                        <input type = \"text\" class = \"form-control input-setting menu_link_url\" name = \"menu_link_url_1\" placeholder = \"Menu URL\">
                    </div>
                </div>
            </div>
            <a href=\"#\" id=\"add_dropdown_menu\" class=\"btn btn-primary btn-xs\">Add dropdown menu</a>
        </div>
    </div>

    <div id = \"background_row_tab\" class=\"settings-tab-form\">
        <div class = \"row bg-tabs\">
            <div class = \"col-xs-6\">
                <select class = \"form-control background-selector input-setting\" name=\"bg_image_type\">
                    <option value = \"0\">None</option>
                    <option value = \"image\">Image</option>
                    <option value = \"video\">Video</option>
                </select>
                <div class = \"form-group image-tab settings-tab-form checkbox\">
                    <div class = \"spacer\"></div>
                    <input type=\"checkbox\" class =  \"input-setting\" id = \"bg_image_parallax\" name = \"bg_image_parallax\"> <label for=\"bg_image_parallax\">Parallax</label>
                    <div class = \"spacer\"></div>
                    <input type=\"checkbox\" class = \"input-setting\" id = \"bg_image_overlay\" name = \"bg_image_overlay\"> <label for=\"bg_image_overlay\">Overlay</label>
                </div>
                <div class = \"form-group video-tab settings-tab-form checkbox\">
                    <div class = \"spacer\"></div>
                    <input type=\"checkbox\" class = \"input-setting\" id = \"bg_video_overlay\" name = \"bg_video_overlay\"> <label for=\"bg_video_overlay\">Overlay</label>
                </div>
            </div>
            <div class = \"col-xs-6\">
                <div class = \"spacer\"></div>
                <div class = \"image-tab settings-tab-form\">
                    <input type=\"hidden\" name=\"bg_image_fid\" class = \"input-setting\">
                    <input type=\"hidden\" name=\"bg_image_preview\" class = \"input-setting\">
                    <div class = \"bg-image-preview\">
                    </div>
                    <a class=\"button remove_bg_image\" style = \"display:none\" href = \"#\">Remove Image</a>
                    <a class=\"button upload_bg_image\" href = \"#\">Select Image</a>
                </div>
                <div class = \"video-tab settings-tab-form\">
                    <input type = \"text\" class = \"form-control input-setting\" name = \"bg_video\" placeholder = \"Video URL\">
                </div>
            </div>
        </div>
        <div class = \"spacer\"></div>
    </div>

    <div id = \"paddings_row_tab\" class=\"settings-tab-form\">
        <div class = \"row paddings\">
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_left\">Left</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_left\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_right\">Right</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_right\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_top\">Top</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_top\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_bottom\">Bottom</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_bottom\">
            </div>
        </div>
    </div>";
        // line 226
        echo "    ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["row_form"] ?? null)));
        echo "
</div>

<!-- Row form -->
<div id = \"row-settings\" title = \"Row Settings\">
    ";
        // line 231
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["row_form"] ?? null)));
        echo "
</div>

";
        // line 236
        echo "    ";
        // line 237
        echo "        ";
        // line 238
        echo "        ";
        // line 239
        echo "        ";
        // line 240
        echo "    ";
        // line 242
        echo "

<!-- Column Settings -->
<div id = \"col-settings\" title = \"Region Settings\">

    <div class=\"settings-tabs\">
        <a href=\"#region_size_tab\" class=\"btn btn-info btn-md show-devices\">Region size</a>
        <a href=\"#left_push_tab\" class=\"btn btn-info btn-md show-devices\">Left Push</a>
        <a href=\"#right_pull_tab\" class=\"btn btn-info btn-md show-devices\">Right Pull</a>
        <a href=\"#left_offset_tab\" class=\"btn btn-info btn-md show-devices\">Left Offset</a>
        <a href=\"#visibility_tab\" class=\"btn btn-info btn-md show-devices\">Visibility</a>
        <a href=\"#paddings_tab\" class=\"btn btn-info btn-md\">Paddings</a>
        <a href=\"#tag_class_tab\" class=\"btn btn-info btn-md\">Tag &amp; Class</a>
    </div>

    <div class=\"row col-settings device-icons-wrap\">
        <div class=\"col-xs-3 centered\">
            <label class=\"sr-only\" for=\"col-xs\"><i class = \"fa fa-mobile fa-5x\"></i></label>
        </div>

        <div class=\"col-xs-3 centered\">
            <label class=\"sr-only\" for=\"col-sm\"><i class=\"fa fa-tablet fa-5x\"></i></label>
        </div>

        <div class=\"col-xs-3 centered\">
            <label class=\"sr-only\" for=\"col-md\"><i class = \"fa fa-laptop fa-5x\"></i></label>
        </div>

        <div class=\"col-xs-3 centered\">
            <label class=\"sr-only\" for=\"col-lg\"><i class = \"fa fa-desktop fa-5x\"></i></label>
        </div>

    </div>


    <div id = \"region_size_tab\" class=\"settings-tab-form\">
        <div class=\"row col-settings\">
            <div class=\"col-xs-3 centered\">
                <select name = \"col-xs\" class = \"form-control numeric-select\">
                    ";
        // line 281
        $context["options"] = "
                    <option value = \"0\">Auto</option>
                    <option value = \"1\">1</option>
                    <option value = \"2\">2</option>
                    <option value = \"3\">3</option>
                    <option value = \"4\">4</option>
                    <option value = \"5\">5</option>
                    <option value = \"6\">6</option>
                    <option value = \"7\">7</option>
                    <option value = \"8\">8</option>
                    <option value = \"9\">9</option>
                    <option value = \"10\">10</option>
                    <option value = \"11\">11</option>
                    <option value = \"12\">12</option>";
        // line 296
        echo "                    ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-sm\" class = \"form-control numeric-select\">
                    ";
        // line 302
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-md\" class = \"form-control numeric-select\">
                    ";
        // line 308
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-lg\" class = \"form-control numeric-select\">
                    ";
        // line 314
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>
        </div>
    </div>

    <div id = \"left_push_tab\" class=\"settings-tab-form\">
        <div class=\"row col-settings\">
            <div class=\"col-xs-3 centered\">
                <select name = \"col-xs-push\" class = \"form-control numeric-select\">
                    ";
        // line 324
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-sm-push\" class = \"form-control numeric-select\">
                    ";
        // line 330
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-md-push\" class = \"form-control numeric-select\">
                    ";
        // line 336
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-lg-push\" class = \"form-control numeric-select\">
                    ";
        // line 342
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>
        </div>
    </div>

    <div id = \"right_pull_tab\" class=\"settings-tab-form\">
        <div class=\"row col-settings\">
            <div class=\"col-xs-3 centered\">
                <select name = \"col-xs-pull\" class = \"form-control numeric-select\">
                    ";
        // line 352
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-sm-pull\" class = \"form-control numeric-select\">
                    ";
        // line 358
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-md-pull\" class = \"form-control numeric-select\">
                    ";
        // line 364
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-lg-pull\" class = \"form-control numeric-select\">
                    ";
        // line 370
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>
        </div>
    </div>

    <div id = \"left_offset_tab\" class=\"settings-tab-form\">
        <div class=\"row col-settings\">
            <div class=\"col-xs-3 centered\">
                <select name = \"col-xs-offset\" class = \"form-control numeric-select\">
                    ";
        // line 380
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-sm-offset\" class = \"form-control numeric-select\">
                    ";
        // line 386
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-md-offset\" class = \"form-control numeric-select\">
                    ";
        // line 392
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>

            <div class=\"col-xs-3 centered\">
                <select name = \"col-lg-offset\" class = \"form-control numeric-select\">
                    ";
        // line 398
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["options"] ?? null)));
        echo "
                </select>
            </div>
        </div>
    </div>

    <div id = \"visibility_tab\" class=\"settings-tab-form\">
        <div class=\"row vissible-settings\">
            <div class = \"eye-icons\">
                <i class=\"fa fa-eye fa-lg\"></i>
                <i class=\"fa fa-eye-slash text-danger fa-lg\"></i>
            </div>

            <div class = \"col-xs-3 centered form-group\">
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-xs\" value=\"visible-xs\" class=\"form-radio\">
                </div>
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-xs\" value=\"hidden-xs\" class=\"form-radio\">
                </div>
            </div>

            <div class = \"col-xs-3 centered form-group\">
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-sm\" value=\"visible-sm\" class=\"form-radio\">
                </div>
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-sm\" value=\"hidden-sm\" class=\"form-radio\">
                </div>
            </div>

            <div class = \"col-xs-3 centered form-group\">
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-md\" value=\"visible-md\" class=\"form-radio\">
                </div>
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-md\" value=\"hidden-md\" class=\"form-radio\">
                </div>
            </div>

            <div class = \"col-xs-3 centered form-group\">
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-lg\" value=\"visible-lg\" class=\"form-radio\">
                </div>
                <div class = \"radio-custom\">
                    <input type=\"radio\" name=\"showing-lg\" value=\"hidden-lg\" class=\"form-radio\">
                </div>
            </div>
        </div>
    </div>

    <div id = \"paddings_tab\" class=\"settings-tab-form\">
        <div class = \"row paddings\">
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_left\">Left</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_left\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_right\">Right</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_right\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_top\">Top</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_top\">
            </div>
            <div class = \"col-xs-3 form-group centered\">
                <label for=\"padding_bottom\">Bottom</label>
                <input type = \"text\" class = \"form-control input-setting\" size = 2 name = \"padding_bottom\">
            </div>
        </div>
    </div>

    <div id = \"tag_class_tab\" class=\"settings-tab-form\">
        <div class = \"row\">
            <div class = \"col-xs-6 form-group\">
                <label for=\"layout_pages\">Extra Classes</label>
                <input type = \"text\" class = \"form-control input-setting\" name = \"class\" placeholder = \"Class\">
            </div>
            <div class = \"col-xs-6\">
                <label for=\"layout_pages\">Tag Type</label>
                <select class = \"form-control input-setting\" name = \"tag\">
                    <option value=\"div\">div</option>
                    <option value=\"section\">section</option>
                    <option value=\"aside\">aside</option>
                    <option value=\"footer\">footer</option>
                    <option value=\"none\">none</option>
                </select>
            </div>
        </div>
    </div>


</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-builder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  609 => 398,  600 => 392,  591 => 386,  582 => 380,  569 => 370,  560 => 364,  551 => 358,  542 => 352,  529 => 342,  520 => 336,  511 => 330,  502 => 324,  489 => 314,  480 => 308,  471 => 302,  461 => 296,  446 => 281,  405 => 242,  403 => 240,  401 => 239,  399 => 238,  397 => 237,  395 => 236,  389 => 231,  380 => 226,  251 => 97,  243 => 92,  234 => 87,  222 => 74,  214 => 69,  206 => 63,  198 => 60,  189 => 56,  183 => 55,  176 => 51,  169 => 50,  167 => 49,  164 => 48,  161 => 47,  157 => 46,  149 => 43,  143 => 42,  140 => 41,  138 => 40,  135 => 39,  131 => 38,  123 => 35,  120 => 34,  117 => 33,  114 => 32,  111 => 31,  108 => 30,  106 => 29,  103 => 28,  99 => 27,  88 => 18,  75 => 15,  72 => 14,  69 => 13,  66 => 12,  63 => 11,  60 => 10,  58 => 9,  55 => 8,  51 => 7,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-builder.html.twig", "/Users/congtran/Documents/KLTN-2018/sourcecode/sites/drupal/modules/custom/nikadevs_cms/templates/nikadevs-cms-layout-builder.html.twig");
    }
}
