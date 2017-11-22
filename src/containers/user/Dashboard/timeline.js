import React, { Component } from 'react';
import ReactSVG from 'react-svg';

import projectIcon from '../../../assets/icons/document-3.svg'
import goalIcon from '../../../assets/icons/bookmark.svg'
import meetingIcon from '../../../assets/icons/placeholder-1.svg'

class Timeline extends Component {

    render() {
        let colorDanger = '#C91B26';
        let colorWarning = '#9C0F5F';
        let colorNeutral = 'rgb(130, 49, 153)';

        return (
            <div className="contentBox">
                <h3>Timeline</h3>

                <div className="o-timeline-item contentBox col-12" style={{ borderColor: colorDanger }}>
                    <div className="o-timeline-item--icon" >
                        <ReactSVG
                            path={projectIcon}
                            className="svg"
                            style={{ fill: colorDanger }}
                        />
                    </div>
                    <div className="o-timeline-item--content">
                        <label>Datetime</label>
                        <p>Project title</p>
                    </div>
                </div>

                <div className="o-timeline-item contentBox col-12" style={{ borderColor: colorWarning }}>
                    <div className="o-timeline-item--icon">
                        <ReactSVG
                            path={goalIcon}
                            className="svg"
                            style={{ fill: colorWarning }}
                        />
                    </div>
                    <div className="o-timeline-item--content">
                        <label>Datetime</label>
                        <p>Project title</p>
                    </div>
                </div>

                <div className="o-timeline-item contentBox col-12" style={{ borderColor: colorWarning }}>
                    <div className="o-timeline-item--icon" >
                        <ReactSVG
                            path={goalIcon}
                            className="svg"
                            style={{ fill: colorWarning }}
                        />
                    </div>
                    <div className="o-timeline-item--content">
                        <label>Datetime</label>
                        <p>Project title</p>
                    </div>
                </div>

                <div className="o-timeline-item contentBox col-12" style={{ borderColor: colorNeutral }}>
                    <div className="o-timeline-item--icon" >
                        <ReactSVG
                            path={meetingIcon}
                            className="svg"
                            style={{ fill: colorNeutral }}
                        />
                    </div>
                    <div className="o-timeline-item--content">
                        <label>Datetime</label>
                        <p>Project title</p>
                    </div>
                </div>

                <div className="o-timeline-item contentBox col-12" style={{ borderColor: colorNeutral }}>
                    <div className="o-timeline-item--icon" >
                        <ReactSVG
                            path={meetingIcon}
                            className="svg"
                            style={{ fill: colorNeutral }}
                        />
                    </div>
                    <div className="o-timeline-item--content">
                        <label>Datetime</label>
                        <p>Project title</p>
                    </div>
                </div>

            </div>
        );
    }
}

export default Timeline;