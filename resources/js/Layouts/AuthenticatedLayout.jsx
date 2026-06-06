import { useState } from 'react';
import { Link } from '@inertiajs/react';

export default function AuthenticatedLayout({ user, header, children }) {
    const [accountOpen, setAccountOpen] = useState(false);
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    return (
        <div className="min-h-screen">
            <nav
                className="sticky top-0 z-50 border-b border-pink-200/40 backdrop-blur-xl"
                style={{
                    background:
                        'linear-gradient(90deg, rgba(255,235,245,0.94), rgba(235,242,255,0.94))',
                }}
            >
                <div className="mx-auto flex max-w-[1500px] items-center justify-between px-6 py-5 lg:px-14">
                    <Link
                        href="/products"
                        className="flex items-center gap-3 text-decoration-none"
                    >
                        <img
                            src="/images/logo.png"
                            alt="LootMarket"
                            className="h-12 w-12 rounded-2xl object-cover"
                        />

                        <span className="text-3xl font-black text-[#d46f8d]">
                            LootMarket
                        </span>
                    </Link>

                    <div className="hidden items-center gap-8 md:flex">
                        <Link
                            href="/products"
                            className="font-bold text-gray-800 transition hover:text-pink-500"
                        >
                            Products
                        </Link>

                        <a
                            href="/cart"
                            className="font-bold text-gray-800 transition hover:text-pink-500"
                        >
                            Cart
                        </a>

                        <div className="relative">
                            <button
                                type="button"
                                onClick={() => setAccountOpen((current) => !current)}
                                className="flex items-center gap-2 border-none bg-transparent font-bold text-gray-800 transition hover:text-pink-500"
                            >
                                Account
                                <span
                                    className={`text-sm transition-transform ${
                                        accountOpen ? 'rotate-180' : ''
                                    }`}
                                >
                                    ▼
                                </span>
                            </button>

                            {accountOpen && (
                                <div className="absolute right-0 top-12 w-64 overflow-hidden rounded-3xl border border-white/80 bg-white/95 p-3 shadow-[0_20px_55px_rgba(160,170,255,0.24)] backdrop-blur-xl">
                                    <div className="mb-2 border-b border-pink-100 px-4 py-3">
                                        <strong className="block text-gray-800">
                                            {user.name}
                                        </strong>

                                        <span className="mt-1 block text-sm text-gray-500">
                                            {user.email}
                                        </span>
                                    </div>

                                    <a
                                        href="/my-orders"
                                        className="flex items-center gap-3 rounded-2xl px-4 py-3 font-bold text-gray-700 transition hover:bg-pink-50 hover:text-pink-500"
                                    >
                                        <span>📦</span>
                                        My Orders
                                    </a>

                                    <a
                                        href="/wishlist"
                                        className="flex items-center gap-3 rounded-2xl px-4 py-3 font-bold text-gray-700 transition hover:bg-pink-50 hover:text-pink-500"
                                    >
                                        <span>♡</span>
                                        Wishlist
                                    </a>

                                    <a
                                        href="/support-messages"
                                        className="flex items-center gap-3 rounded-2xl px-4 py-3 font-bold text-gray-700 transition hover:bg-pink-50 hover:text-pink-500"
                                    >
                                        <span>💬</span>
                                        Support Messages
                                    </a>

                                    <Link
                                        href="/profile"
                                        className="flex items-center gap-3 rounded-2xl bg-gradient-to-r from-pink-100/80 to-indigo-100/80 px-4 py-3 font-bold text-pink-600"
                                    >
                                        <span>⚙️</span>
                                        Account Settings
                                    </Link>

                                    <Link
                                        href={route('logout')}
                                        method="post"
                                        as="button"
                                        className="mt-2 flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-left font-bold text-red-500 transition hover:bg-red-50"
                                    >
                                        <span>↪</span>
                                        Log Out
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>

                    <button
                        type="button"
                        onClick={() => setMobileMenuOpen((current) => !current)}
                        className="rounded-xl border-none bg-white/60 p-3 text-2xl text-gray-700 md:hidden"
                    >
                        {mobileMenuOpen ? '✕' : '☰'}
                    </button>
                </div>

                {mobileMenuOpen && (
                    <div className="border-t border-pink-100 bg-white/90 px-6 py-5 md:hidden">
                        <div className="flex flex-col gap-3">
                            <a
                                href="/products"
                                className="rounded-2xl px-4 py-3 font-bold text-gray-700 hover:bg-pink-50"
                            >
                                Products
                            </a>

                            <a
                                href="/cart"
                                className="rounded-2xl px-4 py-3 font-bold text-gray-700 hover:bg-pink-50"
                            >
                                Cart
                            </a>

                            <a
                                href="/my-orders"
                                className="rounded-2xl px-4 py-3 font-bold text-gray-700 hover:bg-pink-50"
                            >
                                My Orders
                            </a>

                            <a
                                href="/wishlist"
                                className="rounded-2xl px-4 py-3 font-bold text-gray-700 hover:bg-pink-50"
                            >
                                Wishlist
                            </a>

                            <a
                                href="/support-messages"
                                className="rounded-2xl px-4 py-3 font-bold text-gray-700 hover:bg-pink-50"
                            >
                                Support Messages
                            </a>

                            <Link
                                href="/profile"
                                className="rounded-2xl bg-gradient-to-r from-pink-100 to-indigo-100 px-4 py-3 font-bold text-pink-600"
                            >
                                Account Settings
                            </Link>

                            <Link
                                href={route('logout')}
                                method="post"
                                as="button"
                                className="rounded-2xl px-4 py-3 text-left font-bold text-red-500 hover:bg-red-50"
                            >
                                Log Out
                            </Link>
                        </div>
                    </div>
                )}
            </nav>

            {header && (
                <header className="border-b border-white/70 bg-white/60 shadow-sm backdrop-blur-xl">
                    <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {header}
                    </div>
                </header>
            )}

            <main>{children}</main>
        </div>
    );
}
