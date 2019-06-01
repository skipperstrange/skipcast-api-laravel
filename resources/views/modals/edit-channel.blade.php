@extends('layouts.modal-no-footer-save-default')
@section('modalTitle')
    Edit {{$channel->name}}
@endSection()

@section('modalTitle')
    Edit Channel
@endSection()

@section('modalBody')
<form role="form" id="editchannel" method="post">
                        @include('includes/channel-form')
                        <input type="hidden" value="{{$channel->id}}" name="channel_id">
                        <div>
      <a href="#" id="modalCancel" class="btn btn-default" data-dismiss="modal">Close</a>
      <button type="submit" id="modalAction" onclick="return false;" class="btn btn-primary">Save</button>
                        </div>
          </form>
<script>
    $(function(){

        var notice = $('#m-alert');
        var msgbox = $('#modal-notice');

        $('#modalAction').on('click',function(){
            var message = '';
            var channel = $('form#editchannel').serialize();
            axios.post('{{route("channel.save")}}', channel)
            .then(res=> {
                stats = res.data;
                if(stats.class === 'alert-danger'){
                   $.each(stats.message, function(msg, val){
                       notice.removeClass('alert-success');
                       message += '<b>'+val+"</b><br />";
                   });
                   console.log(message);
                }else{
                    notice.removeClass('alert-danger');
                    message = stats.message;
                }
                notice.addClass(stats.class);
                    msgbox.html(message)
                notice.slideDown('fast');
                notice.show(0);

            })
            .catch(function (error) {
                // handle error
                if(error){
                    stats.class = "alert-danger";
                    message = "An unexected error occured. Please try again.";
                    notice.addClass(stats.class);
                    msgbox.html(message)
                    notice.slideDown('fast');
                }
            });
        });
    });

</script>
@endSection()
