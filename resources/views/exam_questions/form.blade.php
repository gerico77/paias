<div class="table-responsive">
    <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
        <thead>
            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
            <th>Question Text</th>
        </thead>
        
        <tbody>
            @if (count($questions) > 0)
                @foreach ($questions as $question)
                    <tr data-entry-id="{{ $question->id }}">
                        <td></td>
                        <td>{!! $question->question_text !!}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No entries in table</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
