import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, errors, reset } = useForm({
        email: '',
        password: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('entrar'));
    };

    return (
        <GuestLayout>
            <Head title="Entrar" />
            <form onSubmit={submit}>
                <div>
                    <label htmlFor="email" value="Email">Email</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                    <span className="text-red-500 mt-2">{errors.email}</span>
                </div>

                <div className="mt-4">
                    <label htmlFor="password" value="Password">Senha</label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <span className="text-red-500 mt-2">{errors.password}</span>
                </div>

                <div className="flex items-center justify-end mt-4">
                    <button className="ml-4 px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-400">
                        Log in
                    </button>
                </div>
            </form>
            <hr class="border-gray-600 mt-7 mr-20 ml-20"/>
                <div class="mt-5 text-center">
                    <a href="register" class="text-gray-400 hover:underline">Não tem cadastro?</a>
                </div>
        </GuestLayout>
    );
}
