import FlashMessage from "@/Components/FlashMessage";
import Pagination from "@/Components/Pagination";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, router, usePage } from "@inertiajs/react";
import {
    IconPlus,
    IconEdit,
    IconTrash,
    IconEyeUp,
    IconEye,
    IconBook,
    IconNumber,
    IconNumber1,
} from "@tabler/icons-react";
import { useEffect, useState } from "react";
import { toast } from "react-hot-toast";

export default function Index({ auth, users, search }) {
    const { flash } = usePage().props;
    console.log(flash);
    const [show, setShow] = useState(flash.message ? true : false);

    const [term, setTerm] = useState(search ? search : "");

    const handleSearch = (e) => {
        if (e.keyCode == 13) {
            router.visit(route("admin.penilaian.index"), {
                method: "get",
                data: {
                    search: e.target.value,
                },
            });
        }
    };

    useEffect(() => {
        setShow(flash.message ? true : false);
    }, [flash]);
    const header = (
        <div className="row g-2 align-items-center">
            <FlashMessage flash={flash} show={show} setShow={setShow} />
            <div className="col">
                <h2 className="page-title">Siswa</h2>
                <div className="text-muted mt-1">
                    {users.meta.from}-{users.meta.to} of {users.meta.total}{" "}
                    siswa
                </div>
            </div>
            <div className="col-auto ms-auto d-print-none">
                <div className="d-flex">
                    <input
                        type="search"
                        className="form-control d-inline-block w-9 "
                        placeholder="Search user…"
                        onKeyUp={handleSearch}
                        onChange={(e) => setTerm(e.target.value)}
                        value={term}
                    />
                </div>
            </div>
        </div>
    );

    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Users" />
            <div className="row row-cards">
                {users.data.map((user) => {
                    return (
                        <div className="col-md-6 col-lg-3" key={user.id}>
                            <div className="card">
                                <div className="card-body p-4 text-center">
                                    <span
                                        className="avatar avatar-xl mb-3 rounded"
                                        style={
                                            user.photo
                                                ? {
                                                      backgroundImage: `url(./storage/${user.photo})`,
                                                  }
                                                : {
                                                      backgroundImage: `url(https://ui-avatars.com/api/?name=${encodeURI(
                                                          user.name
                                                      )})`,
                                                  }
                                        }
                                    />
                                    <h3 className="m-0 mb-1">
                                        <a href="#">{user.name}</a>
                                    </h3>
                                    <div className="text-muted text-capitalize">
                                        {user.gender}
                                    </div>
                                    <div className="mt-3">
                                        <span className="badge bg-purple-lt text-capitalize">
                                            {user.email}
                                        </span>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <Link
                                        href={route(
                                            "admin.penilaian.show",
                                            user.id
                                        )}
                                        className="card-btn"
                                    >
                                        <IconEdit className="icon" />
                                    </Link>
                                    <Link
                                        href={route(
                                            "admin.penilaian.hapalan",
                                            user.id
                                        )}
                                        className="card-btn"
                                    >
                                        <IconBook className="icon" />
                                    </Link>
                                </div>
                            </div>
                        </div>
                    );
                })}
            </div>
            <Pagination
                links={users.meta.links}
                search={search ? search : ""}
            />
        </AuthenticatedLayout>
    );
}
