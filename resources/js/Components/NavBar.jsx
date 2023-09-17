export default function NavBar() {
    return (
        <header>
            <div className='flex justify-between items-center'>
                <div className='w-1/2'>
                    <h1 className='font-bold'>
                        Desafio
                    </h1>
                </div>
                <nav className='w-1/2'>
                    <ul className='list-none flex space-x-2 items-center'>
                        <li><Link to="cadastroAluno">Cadastro aluno</Link></li>
                        <li><Link to="cadastroTurma">Cadastro turma</Link></li>
                    </ul>
                </nav>
            </div>
        </header>
    )
}