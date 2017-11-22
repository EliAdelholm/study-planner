import React, { Component } from 'react';
import ReactSVG from 'react-svg';
import './usernav.css'

import dashboardIcon from '../../assets/icons/test-tube.svg';
import projectsIcon from '../../assets/icons/document-3.svg';
import archiveIcon from '../../assets/icons/folder.svg';
import settingsIcon from '../../assets/icons/settings.svg';
import logoutIcon from '../../assets/icons/padlock.svg';

class UserNav extends Component {

    render() {
        let fillColor = '#F2671F';
        let activeColor = 'rgb(201, 27, 38)';
        let active = this.props.active;

        return (
            <div className="c-sidenav d-none d-md-block col-md-2 col-lg-1">
                <div className="c-sidenav-head">
                </div>
                <div className="c-sidenav-item" onClick={() => this.props.onClick("dashboard")}>
                    <ReactSVG
                        path={dashboardIcon}
                        className="c-sidenav-icon"
                        style={{ fill: active === "dashboard" ? activeColor : fillColor }}
                    />
                    <p>Home</p>
                </div>

                <div className="c-sidenav-item" onClick={() => this.props.onClick("projects")}>
                    <ReactSVG
                        path={projectsIcon}
                        className="c-sidenav-icon"
                        style={{ fill: active === "projects" ? activeColor : fillColor }}
                    />
                    <p>Projects</p>
                </div>

                <div className="c-sidenav-item" onClick={() => this.props.onClick("archive")}>
                    <ReactSVG
                        path={archiveIcon}
                        className="c-sidenav-icon"
                        style={{ fill: active === "archive" ? activeColor : fillColor }}
                    />
                    <p>Archive</p>
                </div>

                <div className="c-sidenav-item" onClick={() => this.props.onClick("settings")}>
                    <ReactSVG
                        path={settingsIcon}
                        className="c-sidenav-icon"
                        style={{ fill: active === "settings" ? activeColor : fillColor }}
                    />
                    <p>Settings</p>
                </div>

                <div className="c-sidenav-item" onClick={() => this.props.onClick("logout")}>
                    <ReactSVG
                        path={logoutIcon}
                        className="c-sidenav-icon"
                        style={{ fill: active === "logout" ? activeColor : fillColor }}
                    />
                    <p>Logout</p>
                </div>
            </div>
        );
    }
}

export default UserNav;