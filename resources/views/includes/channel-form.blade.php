
                <div class="form-group">
                    @csrf
                <label>Channel name</label>
                <input type="text" name="name" value="{{$channel->name}}" data-required="true" title="Please provide a title for your stream." class="form-control rounded" placeholder="Channel name">
                </div>
                <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="{{$channel->description}}" title="Description." class="form-control rounded" placeholder="Channel description">
                </div>
                <div class="form-group">

                    <label>
                        Privacy
                    </label>
                    <select name="privacy" class="form-control m-b">
                        @if(isset($channel->privacy))
                            @if($channel->privacy == 'private')
                                <option value="private" title="This will make your station audible to only you once on air.">Private</option>
                                <option value="public" title="This will make your station audible to all availible listeners once on air.">Public</option>

                            @else
                            <option value="public" title="This will make your station audible to all availible listeners once on air.">Public</option>
                                <option value="private" title="This will make your station audible to only you once on air.">Private</option>

                                @endif

                        @else
                            <option value="private" title="This will make your station audible to only you once on air.">Private</option>
                            <option value="public" title="This will make your station audible to all availible listeners once on air.">Public</option>
                        @endif
                        </select>
                </div>
