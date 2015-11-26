<?php

use yii\widgets\Menu;
use frontend\models\Category;
use slatiusa\nestable\Nestable;

//echo "<pre>";
//print_r(Category::find(1));die;
?>
<!--  / filterBox \ -->
<div class="filterBox clearfix">
    <div class="container">

        <div class="left-side">
            <ul class="nav">
                <?php foreach ($menu as $root): ?>
                    <?php echo "<li><a href='#'>" . $root['content'] . "</a>"; ?>
                    <ul>
                        <?php if(!empty($root['children'])): ?>
                        <?php foreach ($root['children'] as $level1): ?>
                            <?php echo "<li><a href='#'>" . $level1['content'] . "</a>"; ?>
                            <ul>
                                <?php if(!empty($level1['children'])): ?>
                                <?php foreach ($level1['children'] as $level2): ?>
                                    <?php echo "<li><a href='#'>" . $level2['content'] . "</a>"; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <?php echo "</li>"; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <?php echo "</li>"; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class = "right-side">
            <div class = "tab-content">

                <div role = "tabpanel" class = "tab-pane active" id = "cars-vehecle">

                    <div class = "search clearfix row mar-btm-20">
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios1" value = "option1" checked> ALL
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios2" value = "option2"> Kaizan
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios3" value = "option3"> Videos
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios4" value = "option4"> Books
                            </label>
                        </div>
                        <div class = "col-sm-10">
                            <input type = "text" class = "form-control input-lg" placeholder = "Search Kaizen">
                        </div>
                        <div class = "col-sm-2">
                            <button type = "submit" class = "width-full btn btn-primary btn-lg">Search</button>
                        </div>
                    </div>

                    <div class = "list-section clearfix">
                        <ul>
                            <li>
                                <div class = "inner border-none clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class = "inner clearfix">
                                    <div class = "photo"><img src = "assets/images/item-1.jpg"></div>
                                    <div class = "text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href = "#">unassigned link</a>.</p>
                                        <a href = "#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div role = "tabpanel" class = "tab-pane" id = "commercial-vehicle">commercial-vehicle</div>
                <div role = "tabpanel" class = "tab-pane" id = "tyres">tyres</div>
                <div role = "tabpanel" class = "tab-pane" id = "tractors">tractors</div>
                <div role = "tabpanel" class = "tab-pane" id = "two-wheelers">two-wheelers</div>
                <div role = "tabpanel" class = "tab-pane" id = "automotive">automotive</div>
                <div role = "tabpanel" class = "tab-pane" id = "automotive-ancillaries">automotive-ancillaries</div>

                <div role = "tabpanel" class = "tab-pane" id = "tab-2-1">tab-2-1</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-2-2">tab-2-2</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-2-3">tab-2-3</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-2-4">tab-2-4</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-2-5">tab-2-5</div>

                <div role = "tabpanel" class = "tab-pane" id = "tab-3-1">tab-3-1</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-3-2">tab-3-2</div>

                <div role = "tabpanel" class = "tab-pane" id = "tab-4-1">tab-4-1</div>
                <div role = "tabpanel" class = "tab-pane" id = "tab-4-2">tab-4-2</div>

            </div>
        </div>

    </div>
</div>
<!--\ filterBox / -->

<!--/ footerBox \ -->
<footer class = "footerBox">
    <div class = "ul-center">
        <div class = "container">
            <div class = "row">
                <div class = "col-sm-12">
                    <ul>
                        <li><a href = "#" class = "color-white">Existing user ? Login to Kaizan Khanano</a></li>
                        <li><a href = "#">Terms of Use</a></li>
                        <li><a href = "#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--\ footerBox / -->
