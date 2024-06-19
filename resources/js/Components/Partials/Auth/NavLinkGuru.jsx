import React from "react";
import { Link } from "@inertiajs/react";
import {
    IconBook2,
    IconHome,
    IconList,
    IconNumber,
    IconPencil,
    IconPencilCheck,
    IconPencilCode,
    IconRegistered,
    IconUsers,
    IconWashTumbleDry,
} from "@tabler/icons-react";

export default function NavLinkGuru() {
    return (
        <ul className="navbar-nav">
            <li
                className={`nav-item ${
                    route().current("admin.penilaian*") && "active"
                }`}
            >
                <Link
                    className="nav-link"
                    href={route("admin.penilaian.index")}
                >
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconPencilCheck className="icon" />
                    </span>
                    <span className="nav-link-title">Penilaian</span>
                </Link>
            </li>
        </ul>
    );
}
