import { Link, useForm } from "@inertiajs/react";

export default function NavBar() {
    // const { get } = useForm();
    // const submit = (e) => {
    //     e.preventDefault();
    //     get(route('logout'));
    //     console.log('Foi enviado');
    // };
    return (
        <header>
            <div className='flex justify-between items-center p-5 border-b-2'>
                <div className='w-1/2'>
                    <h1 className='font-bold'>
                        <Link href="/dashboard">Desafio</Link>
                    </h1>
                </div>
                <nav className='w-1/2'>
                    <ul className='list-none flex justify-evenly items-center'>
                        <li className="hover:underline"><Link href="/cadastroAluno">Cadastro aluno</Link></li>
                        <li className="hover:underline"><Link href="/cadastroTurma">Cadastro turma</Link></li>
                        <li className="hover:underline"><Link href="/cadastroSala">Cadastro sala</Link></li>
                        <li className="hover:underline"><Link href="/EditRegistro">Perfil</Link></li>
                        {/* <li className="hover:underline">
                            <form onSubmit={submit}>
                                <button className="hover:underline">Sair</button>
                            </form>
                        </li> */}
                    </ul>
                </nav>
            </div>
        </header>
    )
}