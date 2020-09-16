import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import ReactCarousel, { Modal, ModalGateway } from 'react-images';

function Carousel({ images = [] }) {
    if (images.length === 0) return null;

    const maxImagesInPreview = 4;
    const [modalIsOpen, setModalIsOpen] = useState(false);
    const [currentIndex, setCurrentIndex] = useState(0);
    const [mainImage, setMainImage] = useState(images[0]);

    const toggleModal = () => {
        setModalIsOpen(!modalIsOpen);
    };

    const openGallery = idx => () => {
        setMainImage(images[idx]);
        setCurrentIndex(idx);
        setModalIsOpen(true);
    }

    const wrapImages = (images) => {
        if (images.length > maxImagesInPreview)
            return images.slice(0, maxImagesInPreview - 1);
        else
            return images;
    }

    return (
        <React.Fragment>
            <div className="sales__gallery">
                <ul className="sales__images-list">
                    {wrapImages(images).map((x, i) => (
                        <li className={ i === currentIndex ? "sales__image-item sales__image-item_current" : "sales__image-item"}>
                            <img onClick={openGallery(i)} src={x.src} alt="auto" />
                        </li>
                    ))}
                    {images.length > maxImagesInPreview && (
                        <li className="sales__image-item">
                            <div onClick={openGallery(maxImagesInPreview - 1)}>
                                {`+${images.length - maxImagesInPreview + 1}`}
                            </div>
                        </li>
                    )}
                </ul>
                <div className="sales__image_main">
                    <img onClick={openGallery(0)} src={mainImage.src} alt="auto" />
                </div>
            </div>
            <ModalGateway>
                {modalIsOpen ? (
                    <Modal onClose={toggleModal}>
                        <ReactCarousel currentIndex={currentIndex} views={images} />
                    </Modal>
                ) : null}
            </ModalGateway>
        </React.Fragment>
    );
}

export default Carousel;

const elem = document.getElementById('carousel-component');

if (elem) {
    const images = Array.from(elem.querySelectorAll('img')).map(x => ({ src: x.src }));
    ReactDOM.render(<Carousel images={images} />, elem);
}
