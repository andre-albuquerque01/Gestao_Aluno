import { Link } from "@inertiajs/react";

export default function NavBar() {
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
                        <li><Link href="/cadastroAluno">Cadastro aluno</Link></li>
                        <li><Link href="/cadastroTurma">Cadastro turma</Link></li>
                        <li><Link href="/cadastroSala">Cadastro sala</Link></li>
                        <li><Link href="/EditRegistro">Perfil</Link></li>
                    </ul>
                </nav>
            </div>
        </header>
    )
}