<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!--  / filterBox \ -->
<div class="filterBox clearfix">
    <div class="container">

        <div class="left-side">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="category-1">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                Automobiles
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="category-1">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#cars-vehecle" aria-controls="cars-vehecle" role="tab" data-toggle="tab">Cars &amp; Utility Vehecles</a></li>
                                <li role="presentation"><a href="#commercial-vehicle" aria-controls="commercial-vehicle" role="tab" data-toggle="tab">Commercial Vehicles</a></li>
                                <li role="presentation"><a href="#tyres" aria-controls="tyres" role="tab" data-toggle="tab">Tyres</a></li>
                                <li role="presentation"><a href="#tractors" aria-controls="tractors" role="tab" data-toggle="tab">Tractors</a></li>
                                <li role="presentation"><a href="#two-wheelers" aria-controls="two-wheelers" role="tab" data-toggle="tab">Two Wheelers</a></li>
                                <li role="presentation"><a href="#automotive" aria-controls="automotive" role="tab" data-toggle="tab">Automotive</a></li>
                                <li role="presentation"><a href="#automotive-ancillaries" aria-controls="automotive-ancillaries" role="tab" data-toggle="tab">Automotive Ancillaries</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="category-2">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                Item Two
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="category-2">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="#tab-2-1" aria-controls="tab-2-1" role="tab" data-toggle="tab">tab-2-1</a></li>
                                <li role="presentation"><a href="#tab-2-2" aria-controls="tab-2-2" role="tab" data-toggle="tab">tab-2-2</a></li>
                                <li role="presentation"><a href="#tab-2-3" aria-controls="tab-2-3" role="tab" data-toggle="tab">tab-2-3</a></li>
                                <li role="presentation"><a href="#tab-2-4" aria-controls="tab-2-4" role="tab" data-toggle="tab">tab-2-4</a></li>
                                <li role="presentation"><a href="#tab-2-5" aria-controls="tab-2-5" role="tab" data-toggle="tab">tab-2-5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="category-3">
                        <h4 class="panel-title">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    Item Three
                                </a>
                            </h4>
                        </h4>
                    </div>
                    <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="category-3">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="#tab-3-1" aria-controls="tab-3-1" role="tab" data-toggle="tab">tab-3-1</a></li>
                                <li role="presentation"><a href="#tab-3-2" aria-controls="tab-3-2" role="tab" data-toggle="tab">tab-3-2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="category-4">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                Item Four
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="category-4">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="#tab-4-1" aria-controls="tab-4-1" role="tab" data-toggle="tab">tab-4-1</a></li>
                                <li role="presentation"><a href="#tab-4-2" aria-controls="tab-4-2" role="tab" data-toggle="tab">tab-4-2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-side">
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="cars-vehecle">

                    <div class="search clearfix row mar-btm-20">
                        <div class="radio col-sm-3">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> ALL
                            </label>
                        </div>
                        <div class="radio col-sm-3">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Kaizan
                            </label>
                        </div>
                        <div class="radio col-sm-3">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"> Videos
                            </label>
                        </div>
                        <div class="radio col-sm-3">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4"> Books
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input-lg" placeholder="Search Kaizen">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="width-full btn btn-primary btn-lg">Search</button>
                        </div>
                    </div>

                    <div class="list-section clearfix">
                        <ul>
                            <li>
                                <div class="inner border-none clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="inner clearfix">
                                    <div class="photo"><img src="assets/images/item-1.jpg"></div>
                                    <div class="text">
                                        <h4>A paragraph of title.</h4>
                                        <p>A paragraph of text with on <a href="#">unassigned link</a>.</p>
                                        <a href="#">A second row of text with a web link</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="commercial-vehicle">commercial-vehicle</div>
                <div role="tabpanel" class="tab-pane" id="tyres">tyres</div>
                <div role="tabpanel" class="tab-pane" id="tractors">tractors</div>
                <div role="tabpanel" class="tab-pane" id="two-wheelers">two-wheelers</div>
                <div role="tabpanel" class="tab-pane" id="automotive">automotive</div>
                <div role="tabpanel" class="tab-pane" id="automotive-ancillaries">automotive-ancillaries</div>

                <div role="tabpanel" class="tab-pane" id="tab-2-1">tab-2-1</div>
                <div role="tabpanel" class="tab-pane" id="tab-2-2">tab-2-2</div>
                <div role="tabpanel" class="tab-pane" id="tab-2-3">tab-2-3</div>
                <div role="tabpanel" class="tab-pane" id="tab-2-4">tab-2-4</div>
                <div role="tabpanel" class="tab-pane" id="tab-2-5">tab-2-5</div>

                <div role="tabpanel" class="tab-pane" id="tab-3-1">tab-3-1</div>
                <div role="tabpanel" class="tab-pane" id="tab-3-2">tab-3-2</div>

                <div role="tabpanel" class="tab-pane" id="tab-4-1">tab-4-1</div>
                <div role="tabpanel" class="tab-pane" id="tab-4-2">tab-4-2</div>

            </div>
        </div>

    </div>
</div>
<!--  \ filterBox / -->

<!--  / footerBox \ -->
<footer class="footerBox">
    <div class="ul-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="#" class="color-white">Existing user ? Login to Kaizan Khanano</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--  \ footerBox / -->
