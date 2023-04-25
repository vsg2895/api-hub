<form action="{{url('dashboard/clients/id')}}" id="client_delete_form" method="post" autocomplete="off">
    @csrf
    @method('delete')
{{--    <input type="hidden" name="_method" value="delete">--}}
    <div class="modal fade" id="client_delete" tabindex="-1" role="dialog" aria-labelledby="client_deleteLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="client_deleteLabel">{{__('Delete Client')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('Do you want to delete client?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('No')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
