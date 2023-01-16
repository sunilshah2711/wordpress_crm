<div class="right-sidebar mx-1">
    <button class="btn btn-run-color  mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">Left</button>
    <div class="offcanvas offcanvas-start right-offcanvas" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLeftLabel">View Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link active" id="incoming-tab" data-bs-toggle="tab" data-bs-target="#incoming-tab-pane" type="button" role="tab" aria-controls="incoming-tab-pane" aria-selected="true">Incoming</button>
                </li>
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent-tab-pane" type="button" role="tab" aria-controls="sent-tab-pane" aria-selected="false">Sent</button>
                </li>
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link" id="star-tab" data-bs-toggle="tab" data-bs-target="#star-tab-pane" type="button" role="tab" aria-controls="star-tab-pane" aria-selected="false">Star</button>
                </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="incoming-tab-pane" role="tabpanel" aria-labelledby="incoming-tab" tabindex="0">
                    Incoming
                </div>
                <div class="tab-pane fade" id="sent-tab-pane" role="tabpanel" aria-labelledby="sent-tab" tabindex="0">Sent</div>
                <div class="tab-pane fade" id="star-tab-pane" role="tabpanel" aria-labelledby="star-tab" tabindex="0">Star</div>
            </div>
        </div>
    </div>
</div>