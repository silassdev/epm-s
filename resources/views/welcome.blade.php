<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hausify App | Property Management Made Simple</title>
    <meta name="description" content="Hausify App helps landlords, property managers, and tenants handle rent, maintenance, and communication in one platform.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white antialiased">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-500 text-lg font-black text-white shadow-lg shadow-emerald-500/30">
                        H
                    </div>
                    <div>
                        <div class="text-base font-bold tracking-tight">Hausify</div>
                        <div class="text-xs text-slate-400">Property Management SaaS</div>
                    </div>
                </a>

                <nav class="hidden items-center gap-8 md:flex">
                    <a href="#features" class="text-sm font-medium text-slate-300 hover:text-white">Features</a>
                    <a href="#how-it-works" class="text-sm font-medium text-slate-300 hover:text-white">How it works</a>
                    <a href="#pricing" class="text-sm font-medium text-slate-300 hover:text-white">Pricing</a>
                    <a href="#contact" class="text-sm font-medium text-slate-300 hover:text-white">Contact</a>
                </nav>

                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-xl bg-white px-4 py-2 text-sm font-semibold text-slate-900 transition hover:bg-slate-200">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-300 transition hover:text-white">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-xl bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-emerald-500/25 transition hover:bg-emerald-400">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero -->
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(16,185,129,0.18),_transparent_35%),radial-gradient(circle_at_bottom_left,_rgba(59,130,246,0.12),_transparent_30%)]"></div>

            <div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
                <div class="relative z-10">
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-2 text-sm text-emerald-300">
                        Built for landlords, estate managers, and tenants
                    </div>

                    <h1 class="max-w-2xl text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Manage rent, tenants, and maintenance in one place.
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                        Hausify App gives property teams a simple way to collect rent, track units, resolve maintenance requests, and communicate with tenants without the usual chaos.
                    </p>

                    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-2xl bg-emerald-500 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/25 transition hover:bg-emerald-400">
                            Start Free
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                            Explore Features
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-3 gap-4 max-w-xl">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white">24/7</div>
                            <div class="mt-1 text-sm text-slate-400">Tenant access</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white">Fast</div>
                            <div class="mt-1 text-sm text-slate-400">Rent tracking</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white">Simple</div>
                            <div class="mt-1 text-sm text-slate-400">Property ops</div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10">
                    <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-5 shadow-2xl shadow-black/40 backdrop-blur">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <div class="text-sm text-slate-400">Today</div>
                                <div class="text-xl font-bold text-white">Hausify Dashboard</div>
                            </div>
                            <div class="rounded-full bg-emerald-500/15 px-3 py-1 text-xs font-semibold text-emerald-300">
                                Live
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <div class="text-sm text-slate-400">Monthly Rent</div>
                                <div class="mt-2 text-2xl font-black text-white">₦4,250,000</div>
                                <div class="mt-2 text-sm text-emerald-300">+12% from last month</div>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <div class="text-sm text-slate-400">Occupied Units</div>
                                <div class="mt-2 text-2xl font-black text-white">86%</div>
                                <div class="mt-2 text-sm text-slate-300">12 units vacant</div>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <div class="text-sm text-slate-400">Pending Maintenance</div>
                                <div class="mt-2 text-2xl font-black text-white">7</div>
                                <div class="mt-2 text-sm text-slate-300">3 urgent requests</div>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <div class="text-sm text-slate-400">Overdue Rent</div>
                                <div class="mt-2 text-2xl font-black text-white">₦620,000</div>
                                <div class="mt-2 text-sm text-rose-300">Needs follow-up</div>
                            </div>
                        </div>

                        <div class="mt-5 rounded-2xl border border-white/10 bg-slate-950 p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-white">Recent Activity</div>
                                    <div class="mt-1 text-sm text-slate-400">Latest tenant and payment updates</div>
                                </div>
                            </div>

                            <div class="mt-4 space-y-3">
                                <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                                    <span class="text-sm text-slate-300">John Doe paid rent for Unit B2</span>
                                    <span class="text-xs text-emerald-300">Paid</span>
                                </div>
                                <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                                    <span class="text-sm text-slate-300">Maintenance issue reported in Unit A1</span>
                                    <span class="text-xs text-amber-300">Open</span>
                                </div>
                                <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                                    <span class="text-sm text-slate-300">New tenant assigned to Unit C3</span>
                                    <span class="text-xs text-slate-300">New</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="border-t border-white/10 bg-slate-950 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">Everything needed to run property operations.</h2>
                    <p class="mt-4 text-slate-400">
                        Built to reduce manual work and keep rent, tenants, and maintenance in one system.
                    </p>
                </div>

                <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <div class="text-emerald-300 font-semibold">01</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Rent Collection</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Track invoices, payment status, due dates, receipts, and overdue balances.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <div class="text-emerald-300 font-semibold">02</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Tenant Management</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Store tenant details, lease records, and unit assignment in one place.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <div class="text-emerald-300 font-semibold">03</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Maintenance Tracking</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Handle requests, assign staff, and monitor resolution status.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <div class="text-emerald-300 font-semibold">04</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Local Payments</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Integrate payment gateways and support automated confirmations.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it works -->
        <section id="how-it-works" class="border-t border-white/10 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">How it works</h2>

                <div class="mt-10 grid gap-6 lg:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-slate-900 p-6">
                        <div class="text-sm font-semibold text-emerald-300">Step 1</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Add your properties</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Create properties, units, and owner records from the dashboard.</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-slate-900 p-6">
                        <div class="text-sm font-semibold text-emerald-300">Step 2</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Assign tenants and leases</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Track occupancy, rent dates, deposits, and lease duration.</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-slate-900 p-6">
                        <div class="text-sm font-semibold text-emerald-300">Step 3</div>
                        <h3 class="mt-3 text-xl font-bold text-white">Collect rent and resolve issues</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-400">Receive payment updates, send reminders, and manage repairs.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing -->
        <section id="pricing" class="border-t border-white/10 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">Straightforward pricing</h2>
                    <p class="mt-4 text-slate-400">Start small, then expand as the number of units grows.</p>
                </div>

                <div class="mt-10 grid gap-6 lg:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8">
                        <h3 class="text-lg font-bold text-white">Starter</h3>
                        <div class="mt-4 text-4xl font-black text-white">₦15k<span class="text-base font-medium text-slate-400">/month</span></div>
                        <p class="mt-3 text-sm text-slate-400">For small landlords and a few units.</p>
                    </div>

                    <div class="rounded-3xl border border-emerald-500/30 bg-emerald-500/10 p-8 ring-1 ring-emerald-500/20">
                        <h3 class="text-lg font-bold text-white">Growth</h3>
                        <div class="mt-4 text-4xl font-black text-white">₦35k<span class="text-base font-medium text-slate-400">/month</span></div>
                        <p class="mt-3 text-sm text-emerald-100/80">For active property managers with more tenants and collections.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8">
                        <h3 class="text-lg font-bold text-white">Pro</h3>
                        <div class="mt-4 text-4xl font-black text-white">Custom</div>
                        <p class="mt-3 text-sm text-slate-400">For estate firms and larger portfolios.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="border-t border-white/10 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-[2rem] border border-white/10 bg-gradient-to-r from-emerald-500/15 to-blue-500/15 p-10">
                    <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                        <div>
                            <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">Run your properties without scattered records.</h2>
                            <p class="mt-4 text-slate-300">Hausify keeps your property operations clean, digital, and easy to scale.</p>
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row lg:justify-end">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3.5 text-sm font-semibold text-slate-900 transition hover:bg-slate-200">
                                Create Account
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="border-t border-white/10 py-10">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                <div>
                    <div class="text-lg font-bold text-white">Hausify App</div>
                    <div class="mt-1 text-sm text-slate-400">Property management software for modern teams.</div>
                </div>

                <div class="flex flex-wrap items-center gap-6 text-sm text-slate-400">
                    <a href="#features" class="hover:text-white">Features</a>
                    <a href="#pricing" class="hover:text-white">Pricing</a>
                    <a href="#how-it-works" class="hover:text-white">How it works</a>
                    <a href="mailto:hello@hausifyapp.com" class="hover:text-white">hello@hausifyapp.com</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>