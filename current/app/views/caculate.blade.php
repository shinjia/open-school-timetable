@extends('layouts.default')

@section('css')	
	{{ HTML::style('css/form/caculate.css') }}
	{{ HTML::style('css/column_item/style_1.css') }}
	{{ HTML::style('css/caculate.css') }}	
@stop

<?php View::share('titlePrefix', '計算課表'); ?>
<?php View::share('selectUrl', 'caculate'); ?>

@section('content')
	<h1>計算課表</h1>
	
	{{ Helper::message(isset($message) ? $message : '') }}

	{{ FormList::open('' , 'caculate') }}		
		{{ FormList::select('seedCount', '粒子數：', array('range' => array(1, 20), 'value' => isset($oldData) ? $oldData['seedCount'] : '')) }}
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		{{ FormList::select('executeCount', '計算程度：', array('range' => array(1, 20), 'value' => isset($oldData) ? $oldData['executeCount'] : '')) }}
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		{{ FormList::select('extinctionCount', '毀滅次數：', array('range' => array(1, 5), 'value' => isset($oldData) ? $oldData['extinctionCount'] : '')) }}
		<br>		
		{{ FormList::submit('計算') }}
	{{ FormList::close() }}	
	
	@if (isset($seedProgressHistory))		
		@for ($i = 0, $j = 0; $i < count($seedProgressHistory); $i++)
			@if (substr($seedProgressHistory[$i], 0, 3) == 'Ext')
				<ul class="progress_history">
					<li class="title">{{ $seedProgressHistory[$i] }}</li>
					@for (; $j < $i; $j++)
						<li class="item">{{ $seedProgressHistory[$j] }}</li>
					@endfor
					<?php $j++ ?>
				</ul>
			@endif
		@endfor				
	@endif
	
	@if (isset($errorTimetable))
		<div id="error_courseunit" class="column_item column_item_style_1">
			<ul>
				<li class="title">
					發生錯誤的排課
				</li>
				@foreach ($errorTimetable as $key => $courseUnit)										
					<li{{ ($key == 0) ? ' id="first_error"' : ''}}>
						{{ Helper::edit('timetable/view_title/' . Teacher::find($courseUnit['teacher_id'])->title_id . '/' . $courseUnit['teacher_id'] . '/' . $courseUnit['course_unit_id'], $courseUnit['classes_name'] . '&nbsp;' . $courseUnit['teacher_name']. '〔' . $courseUnit['course_name'] . '〕') }}
						@if ($courseUnit['classroom_id'] != 0)						
							{{ '使用' . Helper::add('classroom/edit/' . $courseUnit['classroom_id'], Classroom::find($courseUnit['classroom_id'])->classroom_name, array('class' => 'error_classroom')) }}
						@endif												
					</li>
				@endforeach				
			</ul>
		</div>		
	@endif
@stop