<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
        action="{{ route('admin.admit_card.update',['id'=>$admitcard->id]) }}">
        @csrf
        <div class="form-row">
            <div class="fpb-7">
                <label for="template" class="eForm-label">{{ get_phrase('Template') }}</label>
                <input type="text" class="form-control eForm-control" id="template" name="template"
                    value="{{ $admitcard->template }}" required>
            </div>

            <div class="fpb-7">
                <label for="heading" class="eForm-label">{{ get_phrase('Heading ') }}</label>
                <input type="text" class="form-control eForm-control" id="heading" name="heading"
                    value="{{ $admitcard->heading }}" required>
            </div>

            <div class="fpb-7">
                <label for="title" class="eForm-label">{{ get_phrase('Title ') }}</label>
                <input type="text" class="form-control eForm-control" id="title" name="title"
                    value="{{ $admitcard->title }}" required>
            </div>

            <div class="fpb-7">
                <label for="examname" class="eForm-label">{{ get_phrase('Exam Name ') }}</label>
                <input type="text" class="form-control eForm-control" id="examname" name="examname"
                    value="{{ $admitcard->examname }}" required>
            </div>

            <div class="fpb-7">
                <label for="examcenter" class="eForm-label">{{ get_phrase('Exam Center ') }}</label>
                <input type="text" class="form-control eForm-control" id="examcenter" name="examcenter"
                    value="{{ $admitcard->examcenter }}" required>
            </div>

            <div class="fpb-7">
                <label for="footertext" class="eForm-label">{{ get_phrase('Footer Text ') }}</label>
                <input type="text" class="form-control eForm-control" id="footertext" name="footertext"
                    value="{{ $admitcard->footertext }}" required>
            </div>

            <div class="fpb-7">
                <label for="signature" class="eForm-label">{{ get_phrase('Signature ') }}</label>
                <input class="form-control eForm-control-file" type="file" class="form-control eForm-control"
                    id="signature" name="signature" value="{{ $admitcard->signature }}" required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Update') }}</button>
            </div>
        </div>
    </form>
</div>