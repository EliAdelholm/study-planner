import React, { Component } from 'react';
import ReactSVG from 'react-svg'
import userIcon from '../../../assets/icons/user-3.svg'
import './settings.css'

class Settings extends Component {

    render() {
        return (
            <div className="row">

                <div className="col-12">
                    <div className="contentBox">
                        <h2>Settings</h2>
                    </div>
                </div>

                <div className="col-12">

                    <div className="row">

                        <div className="col-12 col-md-7 col-lg-8 col-xl-9">
                            <div className="row">
                                <div className="col-12 col-xl-6">
                                    <div className="contentBox">
                                        <h3>My Courses</h3>

                                        <div className="clearfix">
                                            <p className="float-left">Web Development</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <div className="clearfix">
                                            <p className="float-left">Interface Design</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <div className="clearfix">
                                            <p className="float-left">Databases</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <form className="clearfix">
                                            <div class="input-group float-left c-settings-add--input">
                                                <div class="input-group-addon border-right-0">ADD</div>
                                                <input type="text" class="form-control c-settings-add--input border-left-0" id="inlineFormInputGroupUsername2" placeholder="Username" />
                                            </div>
                                            <button type="submit" className="float-right btn btn-sm btn-success btn-x">+</button>
                                        </form>
                                    </div>
                                </div>

                                <div className="col-12 col-xl-6">
                                    <div className="contentBox">
                                        <h3>My Project Types</h3>
                                        
                                        <div className="clearfix">
                                            <p className="float-left">Mandatory Assignment</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <div className="clearfix">
                                            <p className="float-left">Homework Assignment</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <div className="clearfix">
                                            <p className="float-left">Exam Project</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <div className="clearfix">
                                            <p className="float-left">Hobby Project</p>
                                            <button className="float-right btn btn-sm btn-danger btn-x"> X </button>
                                        </div>

                                        <form className="clearfix">
                                            <div class="input-group float-left c-settings-add--input">
                                                <div class="input-group-addon border-right-0">ADD</div>
                                                <input type="text" class="form-control c-settings-add--input border-left-0" id="inlineFormInputGroupUsername2" placeholder="Username" />
                                            </div>
                                            <button type="submit" className="float-right btn btn-sm btn-success btn-x">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div className="col-12 col-md-5 col-lg-4 col-xl-3">
                            <div className="contentBox">
                                <h3>Account Details</h3>
                                <ReactSVG
                                    path={userIcon}
                                    className="c-settings-icon"
                                />
                                <p>Eli Adelholm</p>
                                <p>eliadelholm@gmail.com</p>
                                <p>Signed up 24 sep 2017</p>
                                <p>Last login 22 nov 2017</p>
                                <button className="btn btn-sm btn-warning">Edit info</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        );
    }
}

export default Settings;