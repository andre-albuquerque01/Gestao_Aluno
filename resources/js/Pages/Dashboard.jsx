import NavBar from '@/Components/NavBar';
import { Head, Link, usePage } from '@inertiajs/react';
import pencil from '../../img/pencil.gif'
import trash from '../../img/lixo.gif'

import Footer from '@/Components/Footer';
import Sala from '@/Components/Sala';
import Aluno from '@/Components/Aluno';
import Turma from '@/Components/Turma';

export default function Dashboard() {

    return (
        <div className="">
            <Head title="Dashboard" />
            <NavBar />
            <div className="">
                <div className="ml-16">
                    <div className='mt-3 font-bold'>
                        <Sala />
                        <Aluno />
                        <Turma />
                    </div>
                </div>
                <Footer />
            </div>
        </div>
    );
}
