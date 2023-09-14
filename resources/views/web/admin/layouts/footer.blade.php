<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {!! $shopilo_copyright !!}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    {{ __('Version :version', ['version' => config('shopilo.version')]) }}
                </div>
            </div>
        </div>
    </div>
</footer>