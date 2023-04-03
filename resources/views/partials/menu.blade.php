<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ $brand->site_title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-tags">

                            </i>
                            <p>
                                {{ trans('cruds.category.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @feature('dynamic-prompts')
                    <li class="nav-item">
                        <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-question-circle">

                            </i>
                            <p>
                                {{ trans('cruds.question.title') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.tones.index") }}" class="nav-link {{ request()->is("admin/tones") || request()->is("admin/tones/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-music">

                            </i>
                            <p>
                                {{ trans('cruds.tone.title') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.engines.index") }}" class="nav-link {{ request()->is("admin/engines") || request()->is("admin/engines/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-pencil-ruler">

                            </i>
                            <p>
                                {{ trans('cruds.engine.title') }}
                            </p>
                        </a>
                    </li>
                @endfeature
                @feature('multilingual')
                <li class="nav-item">
                    <a href="{{ route("admin.languages.index") }}" class="nav-link {{ request()->is("admin/languages") || request()->is("admin/languages/*") ? "active" : "" }}">
                        <i class="fa-fw nav-icon fas fa-globe-americas">

                        </i>
                        <p>
                            {{ trans('cruds.language.title') }}
                        </p>
                    </a>
                </li>
                @endfeature
                @can('prompt_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.prompts.index") }}" class="nav-link {{ request()->is("admin/prompts") || request()->is("admin/prompts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-key">

                            </i>
                            <p>
                                {{ trans('cruds.prompt.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('subscription_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/plans*") ? "menu-open" : "" }} {{ request()->is("admin/subscriptions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/plans*") ? "active" : "" }} {{ request()->is("admin/subscriptions*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.subscriptionManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('plan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.plans.index") }}" class="nav-link {{ request()->is("admin/plans") || request()->is("admin/plans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cubes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.plan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('subscription_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.subscriptions.index") }}" class="nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.subscription.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/payment-methods*") ? "menu-open" : "" }} {{ request()->is("admin/currencies*") ? "menu-open" : "" }} {{ request()->is("admin/payments*") ? "menu-open" : "" }} {{ request()->is("admin/settings/payment") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/payment-methods*") ? "active" : "" }} {{ request()->is("admin/currencies*") ? "active" : "" }} {{ request()->is("admin/payments*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                            </i>
                            <p>
                                {{ trans('cruds.paymentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('payment_method_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payment-methods.index") }}" class="nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-credit-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paymentMethod.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.currencies.index") }}" class="nav-link {{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.currency.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.payment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.payment') }}" class="nav-link {{ request()->is("admin/settings/payment") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-solid fa-cash-register"></i>
                                        <p>{{ trans('cruds.setting.payment_settings') }}</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/brands*") ? "menu-open" : "" }} {{ request()->is("admin/third-parties*") ? "menu-open" : "" }} {{ request()->is("admin/settings/content") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/brands*") ? "active" : "" }} {{ request()->is("admin/third-parties*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('brand_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.brands.edit", 1) }}" class="nav-link {{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-palette">

                                        </i>
                                        <p>
                                            {{ trans('cruds.brand.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('third_party_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.third-parties.edit", 1) }}" class="nav-link {{ request()->is("admin/third-parties") || request()->is("admin/third-parties/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-key">

                                        </i>
                                        <p>
                                            {{ trans('cruds.thirdParty.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @feature('multilingual')
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.content') }}" class="nav-link {{ request()->is("admin/settings/content") ? "active" : "" }}">
                                    <i class="far fa-file fa-fw mr-1"></i>
                                    <p>{{ trans('cruds.setting.content') }}</p>
                                </a>
                            </li>
                            @endfeature
                        </ul>
                    </li>
                @endcan
                @can('landing_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/landing-pages*") ? "menu-open" : "" }} {{ request()->is("admin/heroes*") ? "menu-open" : "" }} {{ request()->is("admin/partners*") ? "menu-open" : "" }} {{ request()->is("admin/stories*") ? "menu-open" : "" }} {{ request()->is("admin/blocks*") ? "menu-open" : "" }} {{ request()->is("admin/pricings*") ? "menu-open" : "" }} {{ request()->is("admin/testimonials*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/landing-pages*") ? "active" : "" }} {{ request()->is("admin/heroes*") ? "active" : "" }} {{ request()->is("admin/partners*") ? "active" : "" }} {{ request()->is("admin/stories*") ? "active" : "" }} {{ request()->is("admin/blocks*") ? "active" : "" }} {{ request()->is("admin/pricings*") ? "active" : "" }} {{ request()->is("admin/testimonials*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-brush">

                            </i>
                            <p>
                                {{ trans('cruds.customize.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('landing_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.landing-pages.edit", 1) }}" class="nav-link {{ request()->is("admin/landing-pages") || request()->is("admin/landing-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.landingPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hero_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.heroes.edit", 1) }}" class="nav-link {{ request()->is("admin/heroes") || request()->is("admin/heroes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hero.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partner_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partners.index") }}" class="nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partner.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('story_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stories.edit", 1) }}" class="nav-link {{ request()->is("admin/stories") || request()->is("admin/stories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.story.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('block_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blocks.index") }}" class="nav-link {{ request()->is("admin/blocks") || request()->is("admin/blocks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th-large">

                                        </i>
                                        <p>
                                            {{ trans('cruds.block.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pricing_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pricings.edit", 1) }}" class="nav-link {{ request()->is("admin/pricings") || request()->is("admin/pricings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-money-bill-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pricing.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('testimonial_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.testimonials.edit", 1) }}" class="nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.testimonial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
