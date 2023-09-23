import { Link, usePage } from '@inertiajs/react';
import pencil from '../../img/pencil.gif'
import trash from '../../img/lixo.gif'

export default function Sala() {

    return (
        <div className="">
            <div className="">
                <div className="ml-16">
                    <div className='mt-3 font-bold'>
                        <h1>Sala de aula</h1>
                        <p className='font-normal'>A turma que o aluno está alocado, se o aluno não estiver aqui, é porque não foi alocada em nenhuma turma.</p>
                    </div>
                    <div className="flex items-center mt-1 font-normal">
                        <table className="w-2/3 text-center">
                            <tr className='border bg-blue-200'>
                                <th>Posição</th>
                                <th>Código da turma</th>
                                <th>Aluno</th>
                                <th>Editar sala</th>
                                <th>Remover sala</th>
                            </tr>
                            {usePage().props.relacionamento.map((rel, index) => (
                                <tr key={index}>
                                    <td>{index}</td>
                                    <td>
                                        <Link href={`editTurma/${rel.turmas_id}`} className='hover:underline hover:text-blue-700'>
                                            {rel.codTurma}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link href={`editAluno/${rel.alunos_id}`} className='hover:underline hover:text-red-700'>
                                            {rel.nome}
                                        </Link>
                                    </td>
                                    <td>
                                        <Link href={`/editSala/${rel.id_rels}`} className="flex items-center justify-center">
                                            <img src={pencil} alt="" width='20px' title='Editar' />
                                        </Link>
                                    </td>
                                    <td>
                                        <a href={`/deleteSala/${rel.id_rels}`} className="flex items-center justify-center">
                                            <img src={trash} alt="" width='20px' title='Remover' />
                                        </a>
                                    </td>
                                </tr>
                            ))}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
}
