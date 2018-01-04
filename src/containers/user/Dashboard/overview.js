import React, { Component } from 'react';
import ReactSVG from 'react-svg';

import addIcon from '../../../assets/icons/plus.svg'


class Overview extends Component {

    render() {
        let totalColor = '#F2671F';
        let progressColor = 'rgb(156, 15, 95)';
        let doneColor = 'rgb(130, 49, 153)';
        let failColor = 'rgb(201, 27, 38)';

        return (
            <div className="row c-overview">
                <div className="col-12 col-sm-6 col-lg-3">
                    <div className="contentBox c-overview-box">
                        <h3>Projects</h3>
                        <table className="table c-overview-table">
                            <tbody>
                                <tr>
                                    <td>30</td>
                                    <td style={{ color: totalColor }}>Total</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td style={{ color: failColor }}>Abandoned</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style={{ color: progressColor }}>In progress</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td style={{ color: doneColor }}>Finished</td>
                                </tr>
                            </tbody>
                        </table>
                        <ReactSVG
                            path={addIcon}
                            className="c-overview-add"
                        />
                    </div>
                </div>

                <div className="col-12 col-sm-6 col-lg-3">
                    <div className="contentBox c-overview-box">
                        <h3>Goals</h3>

                        <table className="table c-overview-table">
                            <tbody>
                                <tr>
                                    <td>30</td>
                                    <td style={{ color: totalColor }}>Total</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td style={{ color: failColor }}>Abandoned</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style={{ color: progressColor }}>In progress</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td style={{ color: doneColor }}>Finished</td>
                                </tr>
                            </tbody>
                        </table>
                        <ReactSVG
                            path={addIcon}
                            className="c-overview-add"
                        />
                    </div>
                </div>

                <div className="col-12 col-sm-6  col-lg-3">
                    <div className="contentBox c-overview-box" onClick={() => this.props.onAdd("meeting")} >
                        <h3>Meetings</h3>
                        <table className="table c-overview-table" >
                            <tbody>
                                <tr>
                                    <td>30</td>
                                    <td style={{ color: totalColor }}>Total</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td style={{ color: failColor }}>Abandoned</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style={{ color: progressColor }}>In progress</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td style={{ color: doneColor }}>Finished</td>
                                </tr>
                            </tbody>
                        </table>
                        <ReactSVG
                            path={addIcon}
                            className="c-overview-add" 
                            onClick={() => this.props.onAdd("meeting")} 
                        />
                    </div>
                </div>

                <div className="col-12 col-sm-6  col-lg-3">
                    <div className="contentBox c-overview-box">
                        <h3>Deadlines</h3>
                        <table className="table c-overview-table">
                            <tbody>
                                <tr>
                                    <td>30</td>
                                    <td style={{ color: totalColor }}>Total</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td style={{ color: failColor }}>Abandoned</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style={{ color: progressColor }}>In progress</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td style={{ color: doneColor }}>Finished</td>
                                </tr>
                            </tbody>
                        </table>
                        <ReactSVG
                            path={addIcon}
                            className="c-overview-add"
                        />
                    </div>
                </div>
            </div>
        );
    }
}

export default Overview;