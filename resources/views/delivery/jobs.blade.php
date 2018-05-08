<!--Delivery index page-->

<!-- Route::get('/deliveryjobtest', function(){
	return view ('delivery.jobs');
})

This should show store name, customer name, email phone-number , both store and customer current rating, ordered products, a button to set the order as complete.
(go see checklist if this is not too clear.)
(I will add map later.)
-->

@extends('layouts.app')


@section('header-extra')
	<script type="text/javascript" src="/lib/raphael-min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="/lib/es5-shim.min.js"></script>
    <script type="text/javascript" src="/lib/state-machine.min.js"></script>
    <script type="text/javascript" src="/lib/async.min.js"></script>
    <script type="text/javascript" src="/lib/pathfinding-browser.min.js"></script>
    <script type="text/javascript" src="/lib/pathfinding-browser.min.js"></script>
    <script type="text/javascript" src="/js/view.js"></script>
    <script type="text/javascript" src="/js/controller.js"></script>
    <script type="text/javascript" src="/js/panel.js"></script>
@endsection

@section('content')
	<div class="container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
				<script type="text/javascript">
				          //store all store's coordinate
				          //var = ""
				          $(document).ready(function () {
				              

				              if (!Raphael.svg) {
				                  window.location = './notsupported.html';
				              }

				              // suppress select events
				              $(window).bind('selectstart', function (event) {
				                  event.preventDefault();
				              });

				              // initialize visualization
				              Panel.init();
				              Controller.init();

				          });
				      </script>
				<div id="draw_area"></div>
				    <div id="instructions_panel" class="panel"></div>

										    <div id="algorithm_panel" class="panel right_panel">
										      <header><h2 class="header_title"></h2></header>

										      <div class="accordion">
										        <h3 id="astar_header"><a href="#">A*</a></h3>
										        <div id="astar_section" class="finder_section">
										          <header class="option_header">
										            <h3>Heuristic</h3>
										          </header>
										          <div id="astar_heuristic" class="sub_options">
										            <input type="radio" name="astar_heuristic" value="manhattan" checked />
										            <label class="option_label">Manhattan</label> <br>
										            <input type="radio" name="astar_heuristic" value="euclidean"/>
										            <label class="option_label">Euclidean</label> <br>
										            <input type="radio" name="astar_heuristic" value="octile"/>
										            <label class="option_label">Octile</label> <br>
										            <input type="radio" name="astar_heuristic" value="chebyshev"/>
										            <label class="option_label">Chebyshev</label> <br>
										          </div>

										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="allow_diagonal" checked>
										            <label class="option_label">Allow Diagonal</label> <br>
										            <input type="checkbox" class="bi-directional">
										            <label class="option_label">Bi-directional</label> <br>
										            <input type="checkbox" class="dont_cross_corners">
										            <label class="option_label">Don't Cross Corners</label> <br>
										            <input class="spinner" name="astar_weight" value="1">
										            <label class="option_label">Weight</label> <br>
										          </div>
										        </div>

										        <h3 id="ida_header"><a href="#">IDA*</a></h3>
										        <div id="ida_section" class="finder_section">
										          <header class="option_header">
										            <h3>Heuristic</h3>
										          </header>
										          <div id="ida_heuristic" class="sub_options">
										            <input type="radio" name="ida_heuristic" value="manhattan" checked />
										            <label class="option_label">Manhattan</label> <br>
										            <input type="radio" name="ida_heuristic" value="euclidean"/>
										            <label class="option_label">Euclidean</label> <br>
										            <input type="radio" name="ida_heuristic" value="octile"/>
										            <label class="option_label">Octile</label> <br>
										            <input type="radio" name="ida_heuristic" value="chebyshev"/>
										            <label class="option_label">Chebyshev</label> <br>
										          </div>
										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="allow_diagonal" checked>
										            <label class="option_label">Allow Diagonal</label> <br>
										            <input type="checkbox" class="dont_cross_corners">
										            <label class="option_label">Don't Cross Corners</label> <br>
										            <input class="spinner" name="astar_weight" value="1">
										            <label class="option_label">Weight</label> <br>
										            <input class="spinner" name="time_limit" value="10">
										            <label class="option_label">Seconds limit</label> <br>
										            <input type="checkbox" class="track_recursion" checked />
										            <label class="option_label">Visualize recursion</label> <br>
										          </div>
										        </div>

										        <h3 id="breadthfirst_header"><a href="#">Breadth-First-Search</a></h3>
										        <div id="breadthfirst_section" class="finder_section">
										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="allow_diagonal" checked>
										            <label class="option_label">Allow Diagonal</label> <br>
										            <input type="checkbox" class="bi-directional">
										            <label class="option_label">Bi-directional</label> <br>
										            <input type="checkbox" class="dont_cross_corners">
										            <label class="option_label">Don't Cross Corners</label> <br>
										          </div>
										        </div>

										        <h3 id="bestfirst_header"><a href="#">Best-First-Search</a></h3>
										        <div id="bestfirst_section" class="finder_section">
										          <header class="option_header">
										            <h3>Heuristic</h3>
										          </header>
										          <div id="bestfirst_heuristic" class="sub_options">
										            <input type="radio" name="bestfirst_heuristic" value="manhattan" checked />
										            <label class="option_label">Manhattan</label> <br>
										            <input type="radio" name="bestfirst_heuristic" value="euclidean"/>
										            <label class="option_label">Euclidean</label> <br>
										            <input type="radio" name="bestfirst_heuristic" value="octile"/>
										            <label class="option_label">Octile</label> <br>
										            <input type="radio" name="bestfirst_heuristic" value="chebyshev"/>
										            <label class="option_label">Chebyshev</label> <br>
										          </div>

										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="allow_diagonal" checked>
										            <label class="option_label">Allow Diagonal</label> <br>
										            <input type="checkbox" class="bi-directional">
										            <label class="option_label">Bi-directional</label> <br>
										            <input type="checkbox" class="dont_cross_corners">
										            <label class="option_label">Don't Cross Corners</label> <br>
										          </div>
										        </div>

										        <h3 id="dijkstra_header"><a href="#">Dijkstra</a></h3>
										        <div id="dijkstra_section" class="finder_section">
										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="allow_diagonal" checked>
										            <label class="option_label">Allow Diagonal</label> <br>
										            <input type="checkbox" class="bi-directional">
										            <label class="option_label">Bi-directional</label> <br>
										            <input type="checkbox" class="dont_cross_corners">
										            <label class="option_label">Don't Cross Corners</label> <br>
										          </div>
										        </div>

										        <h3 id="jump_point_header"><a href="#">Jump Point Search</a></h3>
										        <div id="jump_point_section" class="finder_section">
										          <header class="option_header">
										            <h3>Heuristic</h3>
										          </header>
										          <div id="jump_point_heuristic" class="sub_options">
										            <input type="radio" name="jump_point_heuristic" value="manhattan" checked />
										            <label class="option_label">Manhattan</label> <br>
										            <input type="radio" name="jump_point_heuristic" value="euclidean"/>
										            <label class="option_label">Euclidean</label> <br>
										            <input type="radio" name="jump_point_heuristic" value="octile"/>
										            <label class="option_label">Octile</label> <br>
										            <input type="radio" name="jump_point_heuristic" value="chebyshev"/>
										            <label class="option_label">Chebyshev</label> <br>
										          </div>
										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="track_recursion" checked>
										            <label class="option_label">Visualize recursion</label> <br>
										          </div>
										        </div>

											<h3 id="orth_jump_point_header"><a href="#">Orthogonal Jump Point Search</a></h3>
										        <div id="orth_jump_point_section" class="finder_section">
										          <header class="option_header">
										            <h3>Heuristic</h3>
										          </header>
										          <div id="orth_jump_point_heuristic" class="sub_options">
										            <input type="radio" name="orth_jump_point_heuristic" value="manhattan" checked />
										            <label class="option_label">Manhattan</label> <br>
										            <input type="radio" name="orth_jump_point_heuristic" value="euclidean"/>
										            <label class="option_label">Euclidean</label> <br>
										            <input type="radio" name="orth_jump_point_heuristic" value="octile"/>
										            <label class="option_label">Octile</label> <br>
										            <input type="radio" name="orth_jump_point_heuristic" value="chebyshev"/>
										            <label class="option_label">Chebyshev</label> <br>
										          </div>
										          <header class="option_header">
										            <h3>Options</h3>
										          </header>
										          <div class="optional sub_options">
										            <input type="checkbox" class="track_recursion" checked>
										            <label class="option_label">Visualize recursion</label> <br>
										          </div>
										        </div>

										      </div><!-- .accordion -->
										    </div><!-- #algorithm_panel -->

										    <div id="play_panel" class="panel right_panel">
										      <button id="button1" class="control_button">Start Search</button>
										      <button id="button2" class="control_button">Pause Search</button>
										      <button id="button3" class="control_button">Clear Walls</button>
										    </div>

										    <div id="stats"></div>
    			</div>

    
</div></div></div></div>
@endsection