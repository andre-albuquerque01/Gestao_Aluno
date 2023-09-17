import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('registro'));
    };

    return (
        <GuestLayout>
            <Head title="Registro" />

            <form onSubmit={submit}>
                <div>
                    <label htmlFor="name">Nome</label>

                    <input
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                   <span className="text-red-500 mt-2">{errors.name}</span>
                </div>

                <div className="mt-4">
                    <label htmlFor="email">Email</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                   <span className="text-red-500 mt-2">{errors.email}</span>
                </div>

                <div className="mt-4">
                    <label htmlFor="password">Senha</label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                   <span className="text-red-500 mt-2">{errors.password}</span>
                </div>

                <div className="mt-4">
                    <label htmlFor="password_confirmation">Confirma senha</label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />

                   <span className="text-red-500 mt-2">{errors.password_confirmation}</span>
                </div>

                <div className="flex items-center justify-end mt-4">
                    <button className="ml-4 px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-400">
                        Registrar
                    </button>
                </div>
            </form>
            <hr class="border-gray-600 mt-7 mr-20 ml-20" />
            <div class="mt-5 text-center">
                <a href="/" class="text-gray-400 hover:underline">Já tem cadastro?</a>
            </div>
        </GuestLayout>
    );
}
