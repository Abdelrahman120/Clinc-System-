import tensorflow as tf
import cv2,os
data_path='"E:\data and ml\Flask-Knee-Osteoarthritis-Classification\Flask-Knee-Osteoarthritis-Classification\MedicalExpert-I"'
categories=os.listdir(data_path)
labels=[i for i in range(len(categories))]

label_dict=dict(zip(categories,labels)) #empty dictionary
print(label_dict)
print(categories)
print(labels)