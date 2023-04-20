<div class="body-footer @yield('footerClass')">
    <div class="footer-container">
        <div class="copyright-text flex justify-center items-center mt-6">
            <span>
                <a href="{{ config('info.creator_fb') }}" class="hover:text-cGold-100">
                    {{ __('index.admin.footer.copyright') . ' ' . date('Y') }}
                </a>
            </span>
        </div>
    </div>
</div>
