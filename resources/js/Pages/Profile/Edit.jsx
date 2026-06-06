import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import DeleteUserForm from './Partials/DeleteUserForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';
import { Head, Link } from '@inertiajs/react';

export default function Edit({ auth, mustVerifyEmail, status }) {
    const userInitial = auth.user.name
        ? auth.user.name.charAt(0).toUpperCase()
        : 'U';

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={null}
        >
            <Head title="Account Settings | LootMarket" />

            <div
                className="min-h-screen py-12 px-4 sm:px-6 lg:px-8"
                style={{
                    background:
                        'radial-gradient(circle at 8% 18%, rgba(255,145,210,0.28), transparent 22%), radial-gradient(circle at 90% 20%, rgba(120,165,255,0.25), transparent 24%), radial-gradient(circle at 50% 95%, rgba(255,210,235,0.38), transparent 30%), linear-gradient(135deg,#ffe9f7,#efe5ff,#dceeff)',
                }}
            >
                <div className="mx-auto max-w-6xl">
                    <div className="mb-10 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p className="mb-2 text-sm font-extrabold uppercase tracking-[0.22em] text-pink-500">
                                LootMarket Account
                            </p>

                            <h1 className="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-400 bg-clip-text text-4xl font-black tracking-tight text-transparent sm:text-5xl">
                                Account Settings
                            </h1>

                            <p className="mt-4 max-w-2xl text-base leading-7 text-gray-600">
                                Manage your personal information, password and
                                account security.
                            </p>
                        </div>

                        <Link
                            href="/products"
                            className="inline-flex w-fit items-center justify-center rounded-2xl bg-gradient-to-r from-pink-500 to-indigo-400 px-6 py-3 font-extrabold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl"
                        >
                            ← Back to Products
                        </Link>
                    </div>

                    <div className="mb-8 rounded-[32px] border border-white/80 bg-white/55 p-6 shadow-[0_24px_70px_rgba(160,170,255,0.18)] backdrop-blur-xl sm:p-8">
                        <div className="flex flex-col gap-5 sm:flex-row sm:items-center">
                            <div className="flex h-20 w-20 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-pink-400 to-indigo-400 text-3xl font-black text-white shadow-lg">
                                {userInitial}
                            </div>

                            <div>
                                <h2 className="text-2xl font-black text-gray-800">
                                    {auth.user.name}
                                </h2>

                                <p className="mt-1 text-gray-600">
                                    {auth.user.email}
                                </p>

                                <span className="mt-3 inline-flex rounded-full bg-gradient-to-r from-pink-400/25 to-indigo-400/25 px-4 py-2 text-sm font-extrabold text-pink-600">
                                    LootMarket Member
                                </span>
                            </div>
                        </div>
                    </div>

                    <div className="grid gap-8">
                        <section className="rounded-[32px] border border-white/80 bg-gradient-to-br from-pink-50/90 via-purple-50/90 to-blue-50/90 p-6 shadow-[0_24px_70px_rgba(160,170,255,0.16)] backdrop-blur-xl sm:p-9">
                            <div className="mb-7 flex items-center gap-4">
                                <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-300/60 to-purple-300/60 text-2xl">
                                    👤
                                </div>

                                <div>
                                    <h2 className="text-2xl font-black text-gray-800">
                                        Profile Information
                                    </h2>

                                    <p className="mt-1 text-sm text-gray-600">
                                        Update your name and email address.
                                    </p>
                                </div>
                            </div>

                            <UpdateProfileInformationForm
                                mustVerifyEmail={mustVerifyEmail}
                                status={status}
                                className="max-w-2xl"
                            />
                        </section>

                        <section className="rounded-[32px] border border-white/80 bg-gradient-to-br from-pink-50/90 via-purple-50/90 to-blue-50/90 p-6 shadow-[0_24px_70px_rgba(160,170,255,0.16)] backdrop-blur-xl sm:p-9">
                            <div className="mb-7 flex items-center gap-4">
                                <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-300/60 to-indigo-300/60 text-2xl">
                                    🔐
                                </div>

                                <div>
                                    <h2 className="text-2xl font-black text-gray-800">
                                        Update Password
                                    </h2>

                                    <p className="mt-1 text-sm text-gray-600">
                                        Use a strong password to protect your
                                        account.
                                    </p>
                                </div>
                            </div>

                            <UpdatePasswordForm className="max-w-2xl" />
                        </section>

                        <section className="rounded-[32px] border border-red-200/70 bg-gradient-to-br from-red-50/90 via-pink-50/90 to-purple-50/90 p-6 shadow-[0_24px_70px_rgba(240,95,127,0.12)] backdrop-blur-xl sm:p-9">
                            <div className="mb-7 flex items-center gap-4">
                                <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-red-300/60 to-pink-300/60 text-2xl">
                                    ⚠️
                                </div>

                                <div>
                                    <h2 className="text-2xl font-black text-gray-800">
                                        Delete Account
                                    </h2>

                                    <p className="mt-1 text-sm text-gray-600">
                                        Permanently remove your LootMarket
                                        account.
                                    </p>
                                </div>
                            </div>

                            <DeleteUserForm className="max-w-2xl" />
                        </section>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
